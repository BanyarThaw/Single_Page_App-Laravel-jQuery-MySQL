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
        if(Auth::check()) {
            if($request->ajax())
            {
                $rooms = Room::all();
                return view('Rooms.ajax.rooms',compact('rooms'))->render();
            }
            else {
                return redirect('reception');
            }
        }
        return view('Users.login');
    }

	//rooms
    public function ajax_rooms_list(Request $request) {
        if(Auth::check()) {
            if($request->ajax())
            {
                $rooms = Room::all();
                return view('Rooms.ajax.rooms_list',compact('rooms'))->render();
            }
            else {
                return redirect('reception');
            }
        }
        return view('Users.login');
    }

	//create room
    public function ajax_rooms_create(Request $request) {
        if(Auth::check()) {
            if($request->ajax())
            {
                $room_types = RoomType::all();
                return view('Rooms.ajax.rooms_create',compact('room_types'))->render();
            }
            else {
                return redirect('reception');
            }        
        }
        return view('Users.login');
    }

	//room detail
    public function ajax_rooms_show($id,Request $request) {
        if(Auth::check()) {
            if($request->ajax())
            {
                $room = Room::find($id);
                return view('Rooms.ajax.rooms_show',compact('room'))->render();
            }
            else {
                return redirect('reception');
            }
        }
        return view('Users.login');
    }

	//store room
    public function ajax_rooms_store(Request $request) {
        if(Auth::check()) {
            $validator = Validator::make($request->all(),[
                'room_name' => [new NotNull],
                'room_number' => [new NotNull],
                'room_type' => [new NotNull],  
            ]);

            if($validator->fails()) {
                return $this->ajax_rooms_create($request);
            }

            $photo = "null";

            $room = new Room();
    
            $room->name = request()->room_name;
            $room->room_number = request()->room_number;
            $room->room_type = request()->room_type;
            $room->room_photo = $photo;
            $room->save();

            return $this->ajax_rooms_list($request);
        }
    }

	//edit room
    public function ajax_rooms_edit($id,Request $request) {
        if(Auth::check()) {
            if($request->ajax())
            {
                $room = Room::find($id);
                $room_types = RoomType::all();
        
                return view('Rooms.ajax.rooms_edit',compact('room','room_types'))->render();
            }
            else {
                return redirect('reception');
            }
        }
        return view('Users.login');
    }

	//update room
    public function ajax_rooms_update(Request $request,$id) {
        if(Auth::check()) {
            $validator = Validator::make($request->all(),[
                'room_name' => [new NotNull],
                'room_number' => [new NotNull],
                'room_type' => [new NotNull],
            ]);

            if ($validator->fails()) {
                return $this->ajax_rooms_edit($id,$request);
            }
            
            else {
                $room = Room::find($id);

                $room->name = request()->room_name;
                $room->room_number = request()->room_number;
                $room->room_type = request()->room_type;
                $room->save();

                return $this->ajax_rooms_list($request);
            }
        }
    }
}
