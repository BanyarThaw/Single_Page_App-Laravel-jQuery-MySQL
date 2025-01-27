<?php

namespace App\Http\Controllers;

use App\Rules\NotNull;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ajaxUserController extends Controller
{
	//users
    public function ajax_users(Request $request) {
        if($request->ajax())
        {
            $users = User::orderBy('created_at','desc')->get();
            return view('Users.ajax.users',compact('users'))->render();
        }
        return redirect('reception');
    }

	//user detail
    public function ajax_users_show($id,Request $request) {
        if($request->ajax())
        {
            $user = User::find($id);
            return view('Users.ajax.users_show',compact('user'));
        }
        return redirect('reception');

    }

	//users
    public function ajax_users_list(Request $request) {
        if($request->ajax())
        {
            $users = User::orderBy('created_at','desc')->get();
            return view('Users.ajax.users_list',compact('users'))->render();
        }
        return redirect('reception');

    }

	//create user
    public function ajax_users_create(Request $request) {
        if($request->ajax()){
            return view('Users.ajax.users_create')->render();
        }
        return redirect('reception');
    }

	//store user
    public function ajax_users_store(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => [new NotNull],
            'email' => 'required|email|unique:users',
            "password" => "required|min:6",
            "password_again" => "same:password",
        ]);

        if($validator->fails()) {
            return $this->ajax_users_create($request);
        }

        $user = new User();

        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = Hash::make(request()->password);
        $user->save();

        return $this->ajax_users_list($request);
    }

	//edit user
    public function ajax_users_edit($id,Request $request) {
        if($request->ajax())
        {
            $user = User::find($id);
            return view('Users.ajax.users_edit',compact('user'))->render();
        }
        return redirect('reception');
    }

	//update user
    public function ajax_users_update(Request $request,$id) {
        $validator = Validator::make($request->all(),[
            'name' => [new NotNull],
            'email' => 'required|email',
            'password' => 'nullable',
        ]);

        if($validator->fails()) {
            return $this->ajax_users_edit($id,$request);
        }
        else if (request()->password == 'undefined' || request()->password == 'null') {
            $user = User::find($id);

            $user->name = request()->name;
            $user->email = request()->email;
            $user->update();

            return $this->ajax_users_list($request); //update case
        }
        else if ( isset(request()->password) && strlen(request()->password) < 6) {
            return $this->ajax_users_edit($id,$request);
        }
        else {
            $user = User::find($id);

            $user->name = request()->name;
            $user->email = request()->email;
            $user->password = Hash::make(request()->password);
            $user->update();

            return $this->ajax_users_list($request);
        }
    }

	//delete user
    public function ajax_users_delete($user_id,Request $request) {
        if($request->ajax()) {
            if(Auth::user()->id == $user_id) {
                return $this->ajax_users_list($request);
            }

            $user = User::find($user_id);
            $user->delete();
            return $this->ajax_users_list($request);
        }
        return redirect('reception');

    }

	//user login
    public function ajax_users_login(Request $request) {
        $input = request()->all();
        if(Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ])) {
            $user = Auth::user();

            $rooms = Room::all();
            return view('Templates.main_templates.ajax.main_template',compact('rooms'))->render();
        } else {
            return view('Users.ajax.login')->with('info','Something went wrong.');
        }
    }

	//user logout
    public function ajax_users_logout(Request $request) {
        if($request->ajax())
        {
            Auth::logout();
            return view('Users.ajax.login')->render();
        }
        return redirect('reception');
    }
}
