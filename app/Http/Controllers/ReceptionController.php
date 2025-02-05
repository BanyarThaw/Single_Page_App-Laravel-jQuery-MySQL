<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Guest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\MessageBag;

class ReceptionController extends Controller
{

	//create guest
    public function create()
    {
        $rooms = Room::latest('id','desc')->get();
        $guests = null;

        return view("Reception.create",compact('rooms','guests'));
    }

	//store guest
    public function store(Request $request)
    {
        $validatedData = request()->validate([
            'guest_name' => 'required',
            'nrc' => 'required',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'adult' => 'required',
            'child' => 'required',
            'address' => 'required',
            'room' => 'required',
        ]);


        $validatedData['name'] = $validatedData['guest_name'];
        unset($validatedData['guest_name']);

        $validatedData['status'] = 1;

        Guest::create($validatedData);

        return redirect('reception/check_in')->with("info","New guest created!!!");
    }

	//reception/check in
    public function check_in()
    {
        $guests = Guest::where('status','1')->orderBy('created_at','desc')->paginate(10);

        $rooms = null;

        return view("Reception.check_in",compact('rooms','guests'));
    }

	//reception/check in/search
    public function check_in_search()
    {
        $search = request()->search;

        $guests = Guest::where('name','LIKE','%'.$search.'%')->where('status','1')->orderBy('created_at','desc')->paginate(10);
        $rooms = null;

        return view("Reception.check_in",compact('rooms','guests'));
    }

	//reception/check out
    public function check_out()
    {
        $guests = Guest::where('status','0')->orderBy('created_at','desc')->paginate(10);
        $rooms = null;

        return view("Reception.check_out",compact('rooms','guests'));
    }

	//reception/check out/search
    public function check_out_search()
    {
        $search = request()->search;

        $guests = Guest::where('name','LIKE','%'.$search.'%')->where('status','0')->orderBy('created_at','desc')->paginate(10);
        $rooms = null;

        return view("Reception.check_out",compact('rooms','guests'));
    }

	//make check out
    public function make_check_out($id)
    {
        $page= $_GET['page_number'];
        $guest = Guest::find($id);

        $guest->status = 0;

        $guest->save();
        return redirect("reception/check_in?page=".$page)->with("info","Guest check-outed!!!");
    }
}
