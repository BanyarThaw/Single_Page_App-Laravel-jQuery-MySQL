<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //main titles (default option without js) (active effect)
    private $main_titles = [
        "guest" => "alive",
        "reception" => "null",
        "user" => "null",
        "room" => "null"
    ];

    /**
     * Return views or redirect for each routes.
     *
     * @return /views 
     */
    public function return_path($path,$value) {
        $guests = $value;
        return view($path,compact('guests'))
            ->with('main_title_guest',$this->main_titles['guest'])
            ->with('main_title_reception',$this->main_titles['reception'])
            ->with('main_title_user',$this->main_titles['user'])
            ->with('main_title_room',$this->main_titles['room']);
    }

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
            $guests = Guest::where('name','LIKE','%'.$search.'%')->orderBy('created_at','desc')->get();
            return $this->return_path("Guests.search",$guests);
        }
        return view('Users.login');
    }
}
