<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ajaxController;
use App\Http\Controllers\ajaxReceptionController;
use App\Http\Controllers\ajaxGuestController;
use App\Http\Controllers\ajaxUserController;
use App\Http\Controllers\ajaxRoomController;
use App\Http\Controllers\ajaxRoomTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\RoomTypeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Ordinary Routes
//-------------------
Route::get('/',function() {
    return redirect('/login');
});

Route::get('/login',function() {
    if(Auth::check()){
        Auth::logout();
    }
    return view('Users.login');
})->name('login');

Route::get('/login',[UserController::class,'LoginForm'])->name('users.login_form');
//Route::post('/users/login',[UserController::class,'login'])->name('users.login');
Route::post('ajax_/users/login',[ajaxUserController::class,'ajax_users_login']);

Route::middleware('auth')->group(function (){

    Route::prefix('guests')->group(function (){
        //guests
        Route::get('/',[GuestController::class,'index'])->name('guests.index');
        Route::get('/list',[GuestController::class,'index'])->name('guests.list');
    });

    Route::prefix('reception')->group(function (){
        //reception
        Route::get('/',[ReceptionController::class,'create'])->name('reception.index');
        Route::get('/create',[ReceptionController::class,'create'])->name('reception.create');
        Route::get('/check_in',[ReceptionController::class,'check_in'])->name('reception.check_in');
        Route::get('/check_out',[ReceptionController::class,'check_out'])->name('reception.check_out');
    });
    Route::prefix('users')->group(function (){
        //users
        Route::get('/',[UserController::class,'index'])->name('users.index');
        Route::get('/list',[UserController::class,'index'])->name('users.list');
        Route::get('/logout',[UserController::class,'logout'])->name('users.logout');
        Route::get('/create',[UserController::class,'create']);
    });

    Route::prefix('rooms')->group(function (){
        //rooms
        Route::get('/',[RoomController::class,'index']);
        Route::get('/list',[RoomController::class,'index']);
        Route::get('/create',[RoomController::class,'create']);

    });

    Route::prefix('roomtypes')->group(function (){
        //room types
        Route::get('/',[RoomTypeController::class,'index']);
        Route::get('/create',[RoomTypeController::class,'create']);
    });

    //AJAX Routes
    //------------------
    Route::prefix('ajax_')->group(function () {
        Route::get('/',[ajaxReceptionController::class,'ajax_reception']);

        //guests
        Route::prefix('guests')->group(function (){
            Route::get('/', [ajaxGuestController::class, 'ajax_guests']);
            Route::get('/list', [ajaxGuestController::class, 'ajax_guests_list']);
            Route::get('/{id}', [ajaxGuestController::class, 'ajax_guests_show'])->name('guests.show');
        });

        Route::prefix('reception')->group(function (){
            Route::get('/',[ajaxReceptionController::class,'ajax_reception']);
            Route::get('/create',[ajaxReceptionController::class,'ajax_reception_create']);
            Route::post('/',[ajaxReceptionController::class,'ajax_reception_store'])->name('reception.store');
            Route::get('/check_in',[ajaxReceptionController::class,'ajax_reception_check_in']);
            Route::get('/check_out',[ajaxReceptionController::class,'ajax_reception_check_out']);
            Route::get('/make_check_out/{id}',[ajaxReceptionController::class,'ajax_reception_make_check_out'])->name('reception.make_check_out');
        });

        Route::prefix('users')->group(function (){
            //users
            Route::get('/logout',[ajaxUserController::class,'ajax_users_logout'])->name('logout');
            Route::get('/',[ajaxUserController::class,'ajax_users']);
            Route::get('/detail/{id}',[ajaxUserController::class,'ajax_users_show'])->name('users.show');
            Route::get('/list',[ajaxUserController::class,'ajax_users_list']);
            Route::get('/create',[ajaxUserController::class,'ajax_users_create']);
            Route::post('/create',[ajaxUserController::class,'ajax_users_store'])->name('users.store');
            Route::get('/edit/{id}',[ajaxUserController::class,'ajax_users_edit'])->name('users.edit');
            Route::post('/edit/{id}',[ajaxUserController::class,'ajax_users_update'])->name('users.update');
            Route::get('/delete/{id}',[ajaxUserController::class,'ajax_users_delete'])->name('users.delete');
        });


        Route::prefix('rooms')->group(function (){
            //rooms
            Route::get('/create',[ajaxRoomController::class,'ajax_rooms_create'])->name('rooms.create');
            Route::get('/list',[ajaxRoomController::class,'ajax_rooms_list'])->name('rooms.index');
            Route::get('/',[ajaxRoomController::class,'ajax_rooms'])->name('rooms');
            Route::post('/store',[ajaxRoomController::class,'ajax_rooms_store'])->name('rooms.store');
            Route::get('/detail/{id}',[ajaxRoomController::class,'ajax_rooms_show'])->name('rooms.show');
            Route::get('/edit/{id}',[ajaxRoomController::class,'ajax_rooms_edit'])->name('rooms.edit');
            Route::post('/edit/{id}',[ajaxRoomController::class,'ajax_rooms_update'])->name('rooms.update');
        });

        Route::prefix('roomtypes')->group(function () {
            //roomtypes
            Route::get('/', [ajaxRoomTypeController::class, 'ajax_roomtypes']);
            Route::post('/', [ajaxRoomTypeController::class, 'ajax_roomtypes_store'])->name('roomtypes.store');;
            Route::get('/create', [ajaxRoomTypeController::class, 'ajax_roomtypes_create'])->name('roomtypes.create');
            Route::get('/edit/{id}', [ajaxRoomTypeController::class, 'ajax_roomtypes_edit'])->name('roomtypes.edit');
            Route::post('/edit/{id}', [ajaxRoomTypeController::class, 'ajax_roomtypes_update'])->name('roomtypes.update');
        });
    });

    Route::prefix('ajax')->group(function () {

        //guests
        Route::get('/guest_list', [ajaxController::class, 'guest_list']); //ajax pagination
        Route::post('/ajax_guest_list', [ajaxController::class, 'ajax_search_guest_list']); //ajax live search

        //receptions
        Route::get('/reception_check_in',[ajaxController::class,'reception_check_in']); //ajax pagination
        Route::get('/reception_check_out',[ajaxController::class,'reception_check_out']); //ajax pagination
        Route::post('/ajax_check_in_list',[ajaxController::class,'ajax_search_reception_check_in']); //ajax live search
        Route::post('/ajax_check_out_list',[ajaxController::class,'ajax_search_reception_check_out']); //ajax live search

        //users
        Route::post('/ajax_user_list',[ajaxController::class,'user_list']); //ajax live search
    });

});

