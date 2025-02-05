<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
	//guests list
    public function index()
    {
        $guests = Guest::orderBy('created_at','desc')->paginate(10);
        return view("Guests.index",compact('guests'));
    }

    public function show($id)
    {
        $guest = Guest::find($id);
        return view("Guests.show",compact('guest'));
    }

	//guests/search
    public function search() {
        $search = request()->search;
        $guests = Guest::where('name','LIKE','%'.$search.'%')->orderBy('created_at','desc')->paginate(10);
        return view("Guests.index",compact('guests'));
    }
}
