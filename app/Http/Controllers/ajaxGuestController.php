<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ajaxGuestController extends Controller
{
	//guests/list
    public function ajax_guests(Request $request) {
        if(Auth::check()) {
            if($request->ajax()) 
            {
                $guests = Guest::orderBy('created_at','desc')->paginate(10);

                return view('Guests.ajax.guests',compact('guests'))->render();
            }
            else {
                return redirect('reception');
            }
        }
        return view('Users.login');
    }
	
	//guests/list
    public function ajax_guests_list(Request $request) {
        if(Auth::check()) {
            if($request->ajax())
            {
                $guests = Guest::orderBy('created_at','desc')->paginate(10);

                return view('Guests.ajax.guests_list',compact('guests'))->render();
            }
            else {
                return redirect('reception');
            }
        }
        return view('Users.login');
    }

	//guest detail
    public function ajax_guests_show($id,Request $request) {
        if(Auth::check()) {
            if($request->ajax())
            {
                $guest = Guest::find($id);

                return view('Guests.ajax.guests_show',compact('guest'));
            }
            else {
                return redirect('reception');
            }        
        }
        return view('Users.login');
    }
}
