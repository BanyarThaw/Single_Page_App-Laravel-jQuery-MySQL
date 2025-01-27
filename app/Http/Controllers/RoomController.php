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
    private $under_line_style = [
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
            ->with('main_title_guest',$this->main_titles['guest'])
            ->with('main_title_reception',$this->main_titles['reception'])
            ->with('main_title_user',$this->main_titles['user'])
            ->with('main_title_room',$this->main_titles['room'])
            ->with('sub_title_index',$this->sub_titles['index'])
            ->with('sub_title_create',$this->sub_titles['create'])
            ->with('sub_title_roomtype',$this->sub_titles['roomtype'])
            ->with('sub_title_roomtype_create',$this->sub_titles['roomtype_create'])
            ->with('under_line_style_index',$this->under_line_style['index'])
            ->with('under_line_style_create',$this->under_line_style['create'])
            ->with('under_line_style_roomtype',$this->under_line_style['roomtype'])
            ->with('under_line_style_roomtype_create',$this->under_line_style['roomtype_create']);
    }

    //menu icon (in mobile view,without js option)
    public function rooms_menu_icon()
    {
        $rooms = null;
        $room_types = null;

        return $this->return_path("Rooms.menu_icon",$rooms,$room_types);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->sub_titles['index'] = "sub_menu_anchor_active";
        $this->under_line_style['index'] = "sub_menus_active";

        $rooms = Room::orderBy('id','desc')->get();
        $room_types = null;
        return $this->return_path("Rooms.index",$rooms,$room_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->sub_titles['create'] = "sub_menu_anchor_active";
        $this->under_line_style['create'] = "sub_menus_active";

        $room_types = RoomType::orderBy('id','desc')->get();
        $rooms = null;
        return $this->return_path("Rooms.create",$rooms,$room_types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->sub_titles['index'] = "sub_menu_anchor_active";
        $this->under_line_style['index'] = "sub_menus_active";
        $room = Room::find($id);
        $room_types = null;
        return $this->return_path("Rooms.show",$room,$room_types);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->sub_titles['index'] = "sub_menu_anchor_active";
        $this->under_line_style['index'] = "sub_menus_active";
        $room = Room::find($id);
        $room_types = RoomType::all();
        return $this->return_path("Rooms.edit",$room,$room_types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect('rooms');
    }
}
