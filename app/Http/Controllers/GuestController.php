<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Return views or redirect for each routes.
     *
     * @return /views 
     */

    //menu icon (in mobile view,without js option)
    public function guests_menu_icon()
    {
        if(Auth::check()) {
            $guests = null;
    
            return $this->return_path("Guests.menu_icon",$guests);
        }
    }

	//guests list
    public function index()
    {
        if(Auth::check()) {
            $guests = Guest::orderBy('created_at','desc')->paginate(10);
            return $this->return_path("Guests.index",$guests);
        }
        return view('Users.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()) {
            $guest = Guest::find($id);
            return $this->return_path("Guests.show",$guest);
        }
        return view('Users.login');
    }
  
	//guests/search
    public function search() {
        if(Auth::check()) {
            $search = request()->search;
            $guests = Guest::where('name','LIKE','%'.$search.'%')->orderBy('created_at','desc')->paginate(10);
            return $this->return_path("Guests.index",$guests);
        }
        return view('Users.login');
    }
}
