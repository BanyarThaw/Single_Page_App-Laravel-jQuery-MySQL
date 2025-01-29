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
	//users list
    public function index()
    {
        if(Auth::check()) {
            $users = User::orderBy('created_at','desc')->get();

            return view("Users.index", ["users" => $users]);
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
            $user = User::find($id);

            return view("Users.show",['user' => $user]);
        }
        return view('Users.login');
    }

	//create form (to create user)
    public function create_form()
    {
        if(Auth::check()) {
            return view("Users.create_form");
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
            $user = User::find($id);

            return view("Users.edit_form",['user' => $user]);
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
            $search = request()->search;
            $users = User::where('name','LIKE','%'.$search.'%')->get();
            
            return view("Users.index",['users' => $users]);
        }
        return view('Users.login');
    }
}
