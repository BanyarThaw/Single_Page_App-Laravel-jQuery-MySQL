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
        if($request->ajax())
        {
            $room_types = RoomType::all();
            return view('RoomType.ajax.roomtypes',compact('room_types'))->render();
        }
        return redirect('reception');
    }

	//create roomtype
    public function ajax_roomtypes_create(Request $request) {
        if($request->ajax()) {
            return view('RoomType.ajax.roomtypes_create')->render();
        }
        return redirect('reception');
    }

	//store roomtype
    public function ajax_roomtypes_store(Request $request) {
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

	//edit roomtype
    public function ajax_roomtypes_edit($id,Request $request) {
        if($request->ajax()) {
            $room_type = RoomType::find($id);
            return view('RoomType.ajax.roomtypes_edit',compact('room_type'))->render();
        }
        return redirect('reception');
    }

	//update roomtype
    public function ajax_roomtypes_update(Request $request,$id) {
        $validator = Validator::make($request->all(),[
            'room_type_name' => [new NotNull],
        ]);

        if ($validator->fails()) {
            return $this->ajax_roomtypes_edit($id,$request);
        }

        $room_type = RoomType::find($id);
        $room_type->name = request()->room_type_name;
        $room_type->save();

        return $this->ajax_roomtypes($request);
    }
}
