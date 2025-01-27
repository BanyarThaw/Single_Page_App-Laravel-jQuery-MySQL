<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ajaxController extends Controller
{
	//Reception
	//----------------
    //reception/check in/ajax pagination
    public function reception_check_in(Request $request) {
        if($request->ajax())
        {
            $guests = Guest::where('status','1')->orderBy('created_at','desc')->paginate(10);
            return view('Reception.check_in_guest_foreach',compact('guests'))->render();
        }
        return redirect('reception');
    }
	//reception/check in/live search
    public function ajax_search_reception_check_in(Request $request) {
        if($request->ajax())
        {
            $search = request()->search;
            if($search == null)
            {
                $search_results = array();

                return $search_results;
                exit();
            }
            $search_results = Guest::where('name','LIKE','%'.$search.'%')->where('status','1')->orderBy('created_at','desc')->get();
            $json_search_results = response()->json($search_results);
            return $json_search_results;
        }
        return redirect('reception');

    }
	//reception/check out/ajax pagination
    public function reception_check_out(Request $request) {
        if($request->ajax())
        {
            $guests = Guest::where('status','0')->orderBy('created_at','desc')->paginate(10);
            return view('Reception.check_out_guest_foreach',compact('guests'))->render();
        }
        return redirect('reception');
    }
	//reception/check out/live search
    public function ajax_search_reception_check_out(Request $request)
    {
        if ($request->ajax()) {
            $search = request()->search;
            if ($search == null) {
                $search_results = array();
                return $search_results;
            }
            $search_results = Guest::where('name', 'LIKE', '%' . $search . '%')->where('status', '0')->orderBy('created_at', 'desc')->get();
            $json_search_results = response()->json($search_results);
            return $json_search_results;
        }
        return redirect('reception');
    }

    //Guests
	//----------------
	//guests/list/ajax pagination
    public function guest_list(Request $request) {
        if($request->ajax())
        {
            $guests = Guest::orderBy('created_at','desc')->paginate(10);
            return view('Guests.guest_foreach',compact('guests'))->render();
        }
        return redirect('reception');
    }
	//guests/list/live search
    public function ajax_search_guest_list(Request $request) {
        if($request->ajax())
        {
            $search = request()->search;
            if($search == null)
            {
                $search_results = array();

                return $search_results;
                exit();
            }
            $search_results = Guest::where('name','LIKE','%'.$search.'%')->get();
            $json_search_results = response()->json($search_results);
            return $json_search_results;
        }
        return redirect('reception');

    }

    //Users
	//----------------
	//users/list/live search
    public function user_list(Request $request) {
        if($request->ajax())
        {
            $search = request()->search;
            if($search == null)
            {
                $search_results = array();
                return $search_results;
            }
            $search_results = User::where('name','LIKE','%'.$search.'%')->get();
            $json_search_results = response()->json($search_results);
            return $json_search_results;
        }
    }
}
