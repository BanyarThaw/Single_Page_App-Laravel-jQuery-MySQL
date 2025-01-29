<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class RoomController extends Controller
{
    //main titles (default option without js) (active effect)
    private $main_titles = [
        "guest" => "null",
        "reception" => "null",
        "user" => "null",
        "room" => "alive"
    ];

    //sub titles (default option without js) (active effect)
    private $sub_titles = [
        "index" => "sub_menu_anchor",
        "create" => "sub_menu_anchor",
        "roomtype" => "sub_menu_anchor",
        "roomtype_create" => "sub_menu_anchor"
    ];
    private $under_line_styles = [
        "index" => "no_style",
        "create" => "no_style",
        "roomtype" => "no_style",
        "roomtype_create" => "no_style"
    ];

    /**
     * Return views or redirect for each routes.
     *
     * @return /views
     */
    public function return_path($path,$value,$room_types) {
        $rooms = $value;
        return view($path,compact('rooms','room_types'))
            ->with(array_merge(
                [
                    'main_title_guest' => $this->main_titles['guest'],
                    'main_title_reception' => $this->main_titles['reception'],
                    'main_title_user' => $this->main_titles['user'],
                    'main_title_room' => $this->main_titles['room'],
                    'sub_title_index' => $this->sub_titles['index'],
                    'sub_title_create' => $this->sub_titles['create'],
                    'sub_title_roomtype' => $this->sub_titles['roomtype'],
                    'sub_title_roomtype_create' => $this->sub_titles['roomtype_create'],
                    'under_line_style_index' => $this->under_line_styles['index'],
                    'under_line_style_create' => $this->under_line_styles['create'],
                    'under_line_style_roomtype' => $this->under_line_styles['roomtype'],
                    'under_line_style_roomtype_create' => $this->under_line_styles['roomtype_create'],
                ]
            ));
    }

    //menu icon (in mobile view,without js option)
    public function rooms_menu_icon()
    {
        $rooms = null;
        $room_types = null;

        return $this->return_path("Rooms.menu_icon",$rooms,$room_types);
    }


    public function index()
    {
        $this->sub_titles['index'] = "sub_menu_anchor_active";
        $this->under_line_style['index'] = "sub_menus_active";

        $rooms = Room::orderBy('id','desc')->get();
        $room_types = null;
        return $this->return_path("Rooms.index",$rooms,$room_types);
    }


    public function create()
    {
        $this->sub_titles['create'] = "sub_menu_anchor_active";
        $this->under_line_style['create'] = "sub_menus_active";

        $room_types = RoomType::orderBy('id','desc')->get();
        $rooms = null;
        return $this->return_path("Rooms.create",$rooms,$room_types);
    }


    public function store(Request $request)
    {
        $validatedData = request()->validate([
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
        $this->sub_titles['index'] = "sub_menu_anchor_active";
        $this->under_line_style['index'] = "sub_menus_active";
        $room = Room::find($id);
        $room_types = null;
        return $this->return_path("Rooms.show",$room,$room_types);
    }


    public function edit($id)
    {
        $this->sub_titles['index'] = "sub_menu_anchor_active";
        $this->under_line_style['index'] = "sub_menus_active";
        $room = Room::find($id);
        $room_types = RoomType::all();
        return $this->return_path("Rooms.edit",$room,$room_types);
    }


    public function update($id)
    {
        $validatedData = request()->validate([
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
