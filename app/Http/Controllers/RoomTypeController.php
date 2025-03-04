<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class RoomTypeController extends Controller
{

    public function index()
    {
        $room_types = RoomType::all();
        return view("RoomType.index",compact("room_types"));
    }

    public function create()
    {
        $room_types = null;
        return view("RoomType.create",compact("room_types"));
    }

    public function store(Request $request)
    {
        request()->validate([
            'room_type_name' => 'required'
        ]);

        $room_type = new RoomType();

        $room_type->name = request()->room_type_name;
        $room_type->save();

        return redirect('roomtypes')->with("info","New Rom type created!!!");
    }


    public function show(RoomType $roomType)
    {
        return redirect('roomtypes');
    }


    public function edit($id)
    {
        $room_type = RoomType::find($id);

        return view("RoomType.edit",compact('room_type'));
    }

    public function update(Request $request,$id)
    {
         request()->validate([
            'room_type_name' => 'required',
        ]);

        $room_type = RoomType::find($id);

        $room_type->name = request()->room_type_name;
        $room_type->save();

        return redirect('roomtypes')->with("info","Room type updated!!!");
    }

    public function destroy(RoomType $roomtype)
    {
        $roomtype->delete();
        return redirect('roomtypes');
    }
}
