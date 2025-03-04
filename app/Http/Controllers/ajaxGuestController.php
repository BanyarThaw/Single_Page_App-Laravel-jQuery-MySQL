<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ajaxGuestController extends Controller
{
	//guests/list
    public function ajax_guests(Request $request) {
        if($request->ajax())
        {
            $guests = Guest::orderBy('created_at','desc')->paginate(10);

            return view('Guests.ajax.guests',compact('guests'))->render();
        }

        return redirect('reception');
    }

	//guests/list
    public function ajax_guests_list(Request $request) {
        if($request->ajax())
        {
            $guests = Guest::orderBy('created_at','desc')->paginate(10);

            return view('Guests.ajax.guests_list',compact('guests'))->render();
        }
        return redirect('reception');
    }

	//guest detail
    public function ajax_guests_show($id,Request $request) {
        if($request->ajax())
        {
            $guest = Guest::where('id',$id)->with('rooms')->first();

            return view('Guests.ajax.guests_show',compact('guest'));
        }
        return redirect('reception');
    }
}
