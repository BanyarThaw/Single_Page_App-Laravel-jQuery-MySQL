<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    //main titles (default option without js) (active effect)
    private $main_titles = [
        "guest" => "null",
        "reception" => "null",
        "user" => "alive",
        "room" => "null"
    ];

    //sub titles (default option without js) (active effect)
    private $sub_titles = [
        "index" => "sub_menu_anchor",
        "create" => "sub_menu_anchor"
    ];
    private $under_line_style = [
        "index" => "no_style",
        "create" => "no_style"
    ];

    /**
     * Return views or redirect for each routes.
     *
     * @return /views 
     */
    public function return_path($path,$value,$value_2) {
        $users = $value;
        $users_2 = $value_2;
        return view($path,compact('users','users_2'))
            ->with('main_title_guest',$this->main_titles['guest'])
            ->with('main_title_reception',$this->main_titles['reception'])
            ->with('main_title_user',$this->main_titles['user'])
            ->with('main_title_room',$this->main_titles['room'])
            ->with('sub_title_index',$this->sub_titles['index'])
            ->with('sub_title_create',$this->sub_titles['create'])
            ->with('under_line_style_index',$this->under_line_style['index'])
            ->with('under_line_style_create',$this->under_line_style['create']);
    }

    //menu icon (in mobile view,without js option)
    public function users_menu_icon()
    {
        if(Auth::check()) {
            $users = null;
            $users_2 = null;
    
            return $this->return_path("Users.menu_icon",$users,$users_2);
        }
    }

	//users list
    public function index()
    {
        if(Auth::check()) {
            $this->sub_titles['index'] = "sub_menu_anchor_active";
            $this->under_line_style['index'] = "sub_menus_active";

            $users = User::orderBy('created_at','desc')->get();
            $users_2 = null;

            return $this->return_path("Users.index",$users,$users_2);
        }
        return view('Users.login');
    }

	//login form
    public function LoginForm()
    {
        return view('Users.login');
    }

	//log in
    public function login()
    {
        $input = request()->all();

        if(Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ])) {
            $user = Auth::user();
            return redirect('reception');
        } else {
            return redirect('users/login')->with("info","Login Failed.Try Again!!!");
        }
    }

	//user detail
    public function show($id)
    {
        if(Auth::check()) {
            $this->sub_titles['index'] = "sub_menu_anchor_active";
            $this->under_line_style['index'] = "sub_menus_active";

            $user = User::find($id);
            $user_2 = null;

            return $this->return_path("Users.show",$user,$user_2);
        }
        return view('Users.login');
    }

	//create form (to create user)
    public function create_form()
    {
        if(Auth::check()) {
            $this->sub_titles['create'] = "sub_menu_anchor_active";
            $this->under_line_style['create'] = "sub_menus_active";

            $user = null;
            $user_2 = null;
            return $this->return_path("Users.create_form",$user,$user_2);
        }
        return view('Users.login');
    }

	//create user
    public function create()
    {
        $validatedData = request()->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6",
            "password_again" => "same:password",
        ]);

        $user = new User();

        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = Hash::make(request()->password);
        $user->save();

        return redirect('users')->with("info","New user created!!!");
    }

	//edit user
    public function edit($id) {
        if(Auth::check()) {
            $this->sub_titles['index'] = "sub_menu_anchor_active";
            $this->under_line_style['index'] = "sub_menus_active";

            $user = User::find($id);
            $user_2 = null;

            return $this->return_path("Users.edit_form",$user,$user_2);
        }
        return view('Users.login');
    }

	//update user
    public function update($id) {
        $validatedData = request()->validate([
            "name" => "required",
            "email" => "required|email",
        ]);

        if(request()->password) {
            $user = User::find($id);

            $user->name = request()->name;
            $user->email = request()->email;
            $user->password = Hash::make(request()->password);
            $user->save();
        }
        else {
            $user = User::find($id);

            $user->name = request()->name;
            $user->email = request()->email;
            $user->save();
        }
        return redirect('users')->with("info","User updated!!!");
    }

	//log out
    public function logout() {
        if(Auth::check()) {
            Auth::logout();
            return redirect('users/login');
        }
    }

	//delete user
    public function delete($user_id) {
        if(Auth::user()->id == $user_id) {
            return redirect('user')->with("info","You are not allowed to delete yourself!!!");
        }

        $user = User::find($user_id);
        $user->delete();
        return redirect('user')->with("info","User deleted!!!");
    }

	//search user
    public function search() {
        if(Auth::check()) {
            $this->sub_titles['index'] = "sub_menu_anchor_active";
            $this->under_line_style['index'] = "sub_menus_active";
            
            $search = request()->search;

            $users = User::where('name','LIKE','%'.$search.'%')->get();
            $users_2 = User::where('email','LIKE','%'.$search.'%')->get();
            return $this->return_path("Users.search",$users,$users_2);
        }
        return view('Users.login');
    }
}
