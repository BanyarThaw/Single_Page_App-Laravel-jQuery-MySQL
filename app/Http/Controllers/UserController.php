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
        $users = User::orderBy('created_at','desc')->get();
        $users_2 = null;

        return view('Users.index',compact('users','users_2'));
    }

	//login form
    public function LoginForm()
    {
        return view('Users.login');
    }

	//log in
    public function login(Request $request)
    {
        $input = request()->all();

        if(Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ])) {
            $user = Auth::user();
            return redirect('reception',compact('user'));
        } else {
            return redirect('users/login')->with("info","Login Failed.Try Again!!!");
        }
    }

	//user detail
    public function show($id)
    {
        $user = User::find($id);
        $user_2 = null;
        return view("users.show",compact('user', 'user_2'));
    }


	//create user
    public function create()
    {
        return view('Users.create_form');
//        request()->validate([
//            "name" => "required",
//            "email" => "required|email|unique:users",
//            "password" => "required|min:6",
//            "password_again" => "same:password",
//        ]);
//
//        $user = new User();
//
//        $user->name = request()->name;
//        $user->email = request()->email;
//        $user->password = Hash::make(request()->password);
//        $user->save();

//        return redirect('users')->with("info","New user created!!!");
    }

	//edit user
    public function edit($id) {
        $user = User::find($id);
        $user_2 = null;

        return view("Users.edit_form",compact("user","user_2"));
    }

	//update user
    public function update($id) {
         request()->validate([
            "name" => "required",
            "email" => "required|email",
        ]);

        $user = User::find($id);

        $user->name = request()->name;
        $user->email = request()->email;
        if(isset(request()->password)){
            $user->password = Hash::make(request()->password);
        }
        $user->update();

        return redirect('users')->with("info","User updated!!!");
    }

	//log out
    public function logout() {
        Auth::logout();
        return redirect('users/login');
    }

	//delete user
    public function delete($user_id) {
        if(Auth::id() == $user_id) {
            return redirect('user')->with("info","You are not allowed to delete yourself!!!");
        }

        $user = User::find($user_id);
        $user->delete();
        return redirect('user')->with("info","User deleted!!!");
    }

	//search user
    public function search() {
        $search = request()->search;
        $users = User::where('name','LIKE','%'.$search.'%')->get();
        return view("Users.index",compact("users"));
    }
}
