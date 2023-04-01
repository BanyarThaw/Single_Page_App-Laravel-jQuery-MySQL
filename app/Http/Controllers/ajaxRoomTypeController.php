<?php

namespace App\Http\Controllers;

use App\Rules\NotNull;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ajaxRoomTypeController extends Controller
{
	//roomtypes
    public function ajax_roomtypes(Request $request) {
        if(Auth::check()) {
            if($request->ajax())
            {
                $room_types = RoomType::all();
                return view('RoomType.ajax.roomtypes',compact('room_types'))->render();
            }
            else {
                return redirect('reception');
            }
        }
        return view('Users.login');
    }   

	//create roomtype
    public function ajax_roomtypes_create(Request $request) {
        if(Auth::check()) {
            if($request->ajax()) {
                return view('RoomType.ajax.roomtypes_create')->render();
            }
            else {
                return redirect('reception');
            }
        }
        return view('Users.login');
    }

	//store roomtype
    public function ajax_roomtypes_store(Request $request) {
        if(Auth::check()) {
            $validator = Validator::make($request->all(),[
                'room_type_name' => [new NotNull],
            ]);

            if($validator->fails()) {
                return $this->ajax_roomtypes_create($request);
            }

            $room_type = new RoomType();

            $room_type->name = request()->room_type_name;
            $room_type->save();

            return $this->ajax_roomtypes($request);
        }
        return view('Users.login');
    }

	//edit roomtype
    public function ajax_roomtypes_edit($id,Request $request) {
        if(Auth::check()) {
            if($request->ajax()) {
                $room_type = RoomType::find($id);
                return view('RoomType.ajax.roomtypes_edit',compact('room_type'))->render();
            }
            else {
                return redirect('reception');
            }
        }
        return view('Users.login');
    }

	//update roomtype
    public function ajax_roomtypes_update(Request $request,$id) {
        if(Auth::check()) {
            $validator = Validator::make($request->all(),[
                'room_type_name' => [new NotNull],
            ]);

            if ($validator->fails()) {
                return $this->ajax_roomtypes_edit($id,$request);
            }
            else {
                $room_type = RoomType::find($id);

                $room_type->name = request()->room_type_name;
                $room_type->save();

                return $this->ajax_roomtypes($request);
            }
        }
    }
}
