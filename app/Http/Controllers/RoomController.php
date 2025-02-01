<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class RoomController extends Controller
{

    //menu icon (in mobile view,without js option)
    public function rooms_menu_icon()
    {
        $rooms = null;
        $room_types = null;

        return view("Rooms.menu_icon",compact('room_types','rooms'));
    }


    public function index()
    {
        $this->sub_titles['index'] = "sub_menu_anchor_active";
        $this->under_line_style['index'] = "sub_menus_active";

        $rooms = Room::orderBy('id','desc')->latest()->get();
        $room_types = null;
        return view("Rooms.index",compact('room_types','rooms'));
    }


    public function create()
    {
        $this->sub_titles['create'] = "sub_menu_anchor_active";
        $this->under_line_style['create'] = "sub_menus_active";

        $room_types = RoomType::orderBy('id','desc')->get();
        $rooms = null;
        return view("Rooms.create",compact('room_types','rooms'));
    }


    public function store(Request $request)
    {
         request()->validate([
            'room_name'=>'required',
            'room_number'=>'required|integer',
            'room_type'=>'required',
        ]);

        $room = new Room();
        $room->room_name = request()->room_name;
        $room->room_number = request()->room_number;
        $room->room_type = request()->room_type;
        $room->save();

        return redirect('rooms')->with("info","New Room created!!!");
    }

    public function show($id)
    {
        $room = Room::find($id);
        $room_types = null;
        return view("Rooms.show",compact('room_types','room'));
    }


    public function edit($id)
    {
        $room = Room::find($id);
        $room_types = RoomType::all();
        return view("Rooms.edit",compact('room','room_types'));
    }


    public function update($id)
    {
        request()->validate([
            'room_name' => 'required',
            'room_number' => 'required',
            'room_type' => 'required',
        ]);

        $room = Room::find($id);

        $room->room_name = request()->room_name;
        $room->room_number = request()->room_number;
        $room->room_type = request()->room_type;

        $room->save();

        return redirect('rooms')->with("info","Room updated!!!");
    }


    public function destroy(Room $room)
    {
        $room->delete();
        return redirect('rooms');
    }
}
