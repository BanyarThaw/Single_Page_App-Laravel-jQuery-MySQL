<?php

namespace App\Http\Controllers;

use App\Rules\NotNull;
use App\Models\Room;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ajaxReceptionController extends Controller
{
	//reception/create
    public function ajax_reception(Request $request) {
        if($request->ajax())
        {
            $rooms = Room::all();
            return view('Reception.ajax.reception',compact('rooms'))->render();
        }
        return redirect('reception');

    }

	//reception/create
    public function ajax_reception_create(Request $request) {
        if($request->ajax()) {
            $rooms = Room::all();
            return view('Reception.ajax.reception_create',compact('rooms'))->render();
        }
        return redirect('reception');

    }

	//guest store
    public function ajax_reception_store(Request $request) {
        $validator = Validator::make($request->all(),[
            'guest_name' => [new NotNull],
            'nrc' => [new NotNull],
            'email' => 'required|email',
            'phone' => [new NotNull],
            'adult' => [new NotNull],
            'child' => [new NotNull],
            'address' => [new NotNull],
            'room' => [new NotNull],
        ]);

        if($validator->fails()) {
            return $this->ajax_reception_create($request);
        }

        $guest = new Guest();

        $guest->name = request()->guest_name;
        $guest->nrc = request()->nrc;
        $guest->email =  request()->email;
        $guest->phone =  request()->phone;
        $guest->adult =  request()->adult;
        $guest->child =  request()->child;
        $guest->address =  request()->address;
        $guest->room =  request()->room;
        $guest->status = 1;
        $guest->save();

        return $this->ajax_reception_check_in($request);
    }

	//reception/check in
    public function ajax_reception_check_in(Request $request) {
        if($request->ajax())
        {
            $guests = Guest::where('status','1')->orderBy('created_at','desc')->paginate(10);
            return view('Reception.ajax.check_in',compact('guests'))->render();
        }
        return redirect('reception');

    }

	//reception/check out
    public function ajax_reception_check_out(Request $request) {
        if($request->ajax()) {
            $guests = Guest::where('status','0')->orderBy('created_at','desc')->paginate(10);
            return view('Reception.ajax.check_out',compact('guests'))->render();
        }
        return redirect('reception');
    }

	//reception/make check out
    public function ajax_reception_make_check_out($id,Request $request) {
        $guest = Guest::find($id);
        $guest->status = 0;
        $guest->save();
        return $this->ajax_reception_check_in($request);
    }
}
