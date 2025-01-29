<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Guest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\MessageBag;

class ReceptionController extends Controller
{
    //main titles (default option without js) (active effect)
    private $main_titles = [
        "guest" => "null",
        "reception" => "alive",
        "user" => "null",
        "room" => "null"
    ];

    //sub titles (default option without js) (active effect)
    private $sub_titles = [
        "create" => "sub_menu_anchor",
        "check_in" => "sub_menu_anchor",
        "check_out" => "sub_menu_anchor"
    ];
    private $under_line_style = [
        "create" => "no_style",
        "check_in" => "no_style",
        "check_out" => "no_style"
    ];

    /**
     * Return views or redirect for each routes.
     *
     * @return /views
     */
    public function return_path($path,$value,$value2) {
        $rooms = $value;
        $guests = $value2;
        return view($path,compact('rooms','guests'))
            ->with(array_merge(
                [
                    'main_title_guest' => $this->main_titles['guest'],
                    'main_title_reception' => $this->main_titles['reception'],
                    'main_title_user' => $this->main_titles['user'],
                    'main_title_room' => $this->main_titles['room'],
                    'sub_title_create' => $this->sub_titles['create'],
                    'sub_title_check_in' => $this->sub_titles['check_in'],
                    'sub_title_check_out' => $this->sub_titles['check_out'],
                    'under_line_style_create' => $this->under_line_style['create'],
                    'under_line_style_check_in' => $this->under_line_style['check_in'],
                    'under_line_style_check_out' => $this->under_line_style['check_out']
                ]
            ));
    }

    //menu icon (in mobile view,without js option)
    public function reception_menu_icon()
    {
        $rooms = null;
        $guests = null;

        return $this->return_path("Reception.menu_icon",$rooms,$guests);
    }

	//create guest
    public function create()
    {
        $this->sub_titles['create'] = "sub_menu_anchor_active";
        $this->under_line_style['create'] = "sub_menus_active";

        $rooms = Room::all();
        $guests = null;

        return $this->return_path("Reception.create",$rooms,$guests);
    }

	//store guest
    public function store(Request $request)
    {
        $validatedData = request()->validate([
            'guest_name' => 'required',
            'nrc' => 'required',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'adult' => 'required',
            'child' => 'required',
            'address' => 'required',
            'room' => 'required',
        ]);

        $guest = new Guest();

        $guest->name = request()->guest_name;
        $guest->nrc = request()->nrc;
        $guest->email = request()->email;
        $guest->phone = request()->phone;
        $guest->adult = request()->adult;
        $guest->child = request()->child;
        $guest->address = request()->address;
        $guest->room = request()->room;
        $guest->status = 1;
        $guest->save();

        return redirect('reception/check_in')->with("info","New guest created!!!");
    }

	//reception/check in
    public function check_in()
    {
        $this->sub_titles['check_in'] = "sub_menu_anchor_active";
        $this->under_line_style['check_in'] = "sub_menus_active";

        $guests = Guest::where('status','1')->orderBy('created_at','desc')->paginate(10);

        $rooms = null;

        return $this->return_path("Reception.check_in",$rooms,$guests);
    }

	//reception/check in/search
    public function check_in_search()
    {
        $this->sub_titles['check_in'] = "sub_menu_anchor_active";
        $this->under_line_style['check_in'] = "sub_menus_active";

        $search = request()->search;

        $guests = Guest::where('name','LIKE','%'.$search.'%')->where('status','1')->orderBy('created_at','desc')->paginate(10);
        $rooms = null;

        return $this->return_path("Reception.check_in",$rooms,$guests);
    }

	//reception/check out
    public function check_out()
    {
        $this->sub_titles['check_out'] = "sub_menu_anchor_active";
        $this->under_line_style['check_out'] = "sub_menus_active";

        $guests = Guest::where('status','0')->orderBy('created_at','desc')->paginate(10);
        $rooms = null;

        return $this->return_path("Reception.check_out",$rooms,$guests);
    }

	//reception/check out/search
    public function check_out_search()
    {
        $this->sub_titles['check_out'] = "sub_menu_anchor_active";
        $this->under_line_style['check_out'] = "sub_menus_active";

        $search = request()->search;

        $guests = Guest::where('name','LIKE','%'.$search.'%')->where('status','0')->orderBy('created_at','desc')->paginate(10);
        $rooms = null;

        return $this->return_path("Reception.check_out",$rooms,$guests);
    }

	//make check out
    public function make_check_out($id)
    {
        $page= $_GET['page_number'];
        $guest = Guest::find($id);

        $guest->status = 0;

        $guest->save();
        return redirect("reception/check_in?page=".$page)->with("info","Guest check-outed!!!");
    }
}
