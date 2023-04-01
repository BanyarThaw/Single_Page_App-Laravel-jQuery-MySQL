<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class RoomTypeController extends Controller
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
        "rooms" => "sub_menu_anchor",
        "index" => "sub_menu_anchor",
        "create" => "sub_menu_anchor"
    ];
    private $under_line_style = [
        "rooms" => "no_style",
        "index" => "no_style",
        "create" => "no_style"
    ];

    /**
     * Return views or redirect for each routes.
     *
     * @return /views 
     */
    public function return_path($path,$value) {
        $room_types = $value;
        return view($path,compact('room_types'))
            ->with('main_title_guest',$this->main_titles['guest'])
            ->with('main_title_reception',$this->main_titles['reception'])
            ->with('main_title_user',$this->main_titles['user'])
            ->with('main_title_room',$this->main_titles['room'])
            ->with('sub_title_rooms',$this->sub_titles['rooms'])
            ->with('sub_title_index',$this->sub_titles['index'])
            ->with('sub_title_create',$this->sub_titles['create'])
            ->with('under_line_style_rooms',$this->under_line_style['rooms'])
            ->with('under_line_style_index',$this->under_line_style['index'])
            ->with('under_line_style_create',$this->under_line_style['create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
            $this->sub_titles['index'] = "sub_menu_anchor_active";
            $this->under_line_style['index'] = "sub_menus_active";

            $room_types = RoomType::all();
            return $this->return_path("RoomType.index",$room_types);
        }
        return view('Users.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()) {
            $this->sub_titles['create'] = "sub_menu_anchor_active";
            $this->under_line_style['create'] = "sub_menus_active";

            $room_types = null;
            return $this->return_path("RoomType.create",$room_types);       
        }
        return view('Users.login');
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
            'room_type_name' => 'required'
        ]);

        $room_type = new RoomType();

        $room_type->name = request()->room_type_name;
        $room_type->save();

        return redirect('roomtypes')->with("info","New Rom type created!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        if(Auth::check()) {
            return redirect('roomtypes');
        }
        return view('Users.login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()) {
            $this->sub_titles['index'] = "sub_menu_anchor_active";
            $this->under_line_style['index'] = "sub_menus_active";

            $room_type = RoomType::find($id);

            return $this->return_path("RoomType.edit",$room_type);
        }
        return view('Users.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validatedData = request()->validate([
            'room_type_name' => 'required',
        ]);

        $room_type = RoomType::find($id);

        $room_type->name = request()->room_type_name;
        $room_type->save();

        return redirect('roomtypes')->with("info","Room type updated!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $roomtype)
    {
        if(Auth::check()) {
            $roomtype->delete();
            return redirect('roomtypes');
        }
        return view('Users.login');
    }
}
