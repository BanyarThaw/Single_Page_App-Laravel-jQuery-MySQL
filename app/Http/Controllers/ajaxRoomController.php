<?php

namespace App\Http\Controllers;

use App\Rules\NotNull;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ajaxRoomController extends Controller
{
	//rooms
    public function ajax_rooms(Request $request) {
        if($request->ajax())
        {
            $rooms = Room::orderBy('id','desc')->get();
            return view('Rooms.ajax.rooms',compact('rooms'))->render();
        }
        return redirect('reception');

    }

	//rooms
    public function ajax_rooms_list(Request $request) {
        if($request->ajax())
        {
            $rooms = Room::all();
            return view('Rooms.ajax.rooms_list',compact('rooms'))->render();
        }
        return redirect('reception');

    }

	//create room
    public function ajax_rooms_create(Request $request) {
        if($request->ajax())
        {
            $room_types = RoomType::all();
            return view('Rooms.ajax.rooms_create',compact('room_types'))->render();
        }
        return redirect('reception');

    }

	//room detail
    public function ajax_rooms_show($id,Request $request) {
        if($request->ajax())
        {
            $room = Room::find($id);
            return view('Rooms.ajax.rooms_show',compact('room'))->render();
        }
        return redirect('reception');

    }

	//store room
    public function ajax_rooms_store(Request $request) {
        $validator = Validator::make($request->all(),[
            'room_name' => [new NotNull],
            'room_number' => [new NotNull],
            'room_type' => [new NotNull],
        ]);

        if($validator->fails()) {
            return $this->ajax_rooms_create($request);
        }

        $room = new Room();

        $room->room_name = request()->room_name;
        $room->room_number = request()->room_number;
        $room->room_type = request()->room_type;
        $room->save();

        return $this->ajax_rooms_list($request);
    }

	//edit room
    public function ajax_rooms_edit($id,Request $request) {
        if($request->ajax())
        {
            $room = Room::find($id);
            $room_types = RoomType::all();

            return view('Rooms.ajax.rooms_edit',compact('room','room_types'))->render();
        }
        return redirect('reception');
    }

	//update room
    public function ajax_rooms_update(Request $request,$id) {
        $validator = Validator::make($request->all(),[
            'room_name' => [new NotNull],
            'room_number' => [new NotNull],
            'room_type' => [new NotNull],
        ]);

        if ($validator->fails()) {
            return $this->ajax_rooms_edit($id,$request);
        }

        $room = Room::find($id);

        $room->room_name = request()->room_name;
        $room->room_number = request()->room_number;
        $room->room_type = request()->room_type;
        $room->save();

        return $this->ajax_rooms_list($request);
    }
}
