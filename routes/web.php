<?php

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

//AJAX Routes
//------------------
Route::get('ajax_/',[ajaxReceptionController::class,'ajax_reception']);

//reception
Route::get('ajax_/reception',[ajaxReceptionController::class,'ajax_reception']);
Route::post('ajax_/reception',[ajaxReceptionController::class,'ajax_reception_store']);
Route::get('ajax_/reception/create',[ajaxReceptionController::class,'ajax_reception_create']);
Route::get('ajax_/reception/check_in',[ajaxReceptionController::class,'ajax_reception_check_in']);
Route::get('ajax_/reception/check_out',[ajaxReceptionController::class,'ajax_reception_check_out']);
Route::get('ajax_/reception/make_check_out/{id}',[ajaxReceptionController::class,'ajax_reception_make_check_out']);
Route::get('ajax/reception_check_in',[ajaxController::class,'reception_check_in']); //ajax pagination
Route::get('ajax/reception_check_out',[ajaxController::class,'reception_check_out']); //ajax pagination
Route::post('ajax/ajax_check_in_list',[ajaxController::class,'ajax_search_reception_check_in']); //ajax live search
Route::post('ajax/ajax_check_out_list',[ajaxController::class,'ajax_search_reception_check_out']); //ajax live search

//guests
Route::get('ajax_/guests',[ajaxGuestController::class,'ajax_guests']);
Route::get('ajax_/guests/list',[ajaxGuestController::class,'ajax_guests_list']);
Route::get('ajax_/guests/{id}',[ajaxGuestController::class,'ajax_guests_show']);
Route::get('ajax/guest_list',[ajaxController::class,'guest_list']); //ajax pagination
Route::post('ajax/ajax_guest_list',[ajaxController::class,'ajax_search_guest_list']); //ajax live search

//users
Route::post('ajax_/users/login',[ajaxUserController::class,'ajax_users_login']);
Route::get('ajax_/users/logout',[ajaxUserController::class,'ajax_users_logout']);
Route::get('ajax_/users',[ajaxUserController::class,'ajax_users']);
Route::get('ajax_/users/detail/{id}',[ajaxUserController::class,'ajax_users_show']);
Route::get('ajax_/users/list',[ajaxUserController::class,'ajax_users_list']);
Route::get('ajax_/users/create',[ajaxUserController::class,'ajax_users_create']);
Route::post('ajax_/users/create',[ajaxUserController::class,'ajax_users_store']);
Route::get('ajax_/users/edit/{id}',[ajaxUserController::class,'ajax_users_edit']);
Route::post('ajax_/users/edit/{id}',[ajaxUserController::class,'ajax_users_update']);
Route::get('ajax_/users/delete/{id}',[ajaxUserController::class,'ajax_users_delete']);
Route::post('ajax/ajax_user_list',[ajaxController::class,'user_list']); //ajax live search

//rooms
Route::get('ajax_/rooms',[ajaxRoomController::class,'ajax_rooms']);
Route::post('ajax_/rooms',[ajaxRoomController::class,'ajax_rooms_store']);
Route::get('ajax_/rooms/list',[ajaxRoomController::class,'ajax_rooms_list']);
Route::get('ajax_/rooms/detail/{id}',[ajaxRoomController::class,'ajax_rooms_show']);
Route::get('ajax_/rooms/create',[ajaxRoomController::class,'ajax_rooms_create']);
Route::get('ajax_/rooms/edit/{id}',[ajaxRoomController::class,'ajax_rooms_edit']);
Route::post('ajax_/rooms/edit/{id}',[ajaxRoomController::class,'ajax_rooms_update']);

//roomtypes
Route::get('ajax_/roomtypes',[ajaxRoomTypeController::class,'ajax_roomtypes']);
Route::post('ajax_/roomtypes',[ajaxRoomTypeController::class,'ajax_roomtypes_store']);
Route::get('ajax_/roomtypes/create',[ajaxRoomTypeController::class,'ajax_roomtypes_create']);
Route::get('ajax_/roomtypes/edit/{id}',[ajaxRoomTypeController::class,'ajax_roomtypes_edit']);
Route::post('ajax_/roomtypes/edit/{id}',[ajaxRoomTypeController::class,'ajax_roomtypes_update']);

//Ordinary Routes
//-------------------
Route::get('/',function() {
    return redirect('/reception');
});

//reception
Route::get('reception',[ReceptionController::class,'create']);
Route::post('reception',[ReceptionController::class,'store']);
Route::get('reception/create',[ReceptionController::class,'create']);
Route::get('reception/check_in',[ReceptionController::class,'check_in']);
Route::get('reception/check_out',[ReceptionController::class,'check_out']);
Route::get('reception/make_check_out/{id}',[ReceptionController::class,'make_check_out']);
Route::post('reception/check_in/search',[ReceptionController::class,'check_in_search']);
Route::post('reception/check_out/search',[ReceptionController::class,'check_out_search']);
Route::get('reception/menu_icon',[ReceptionController::class,'reception_menu_icon']);

//guests
Route::post('guests/search',[GuestController::class,'search']);  //guests/search later
Route::get('guests',[GuestController::class,'index']);
Route::get('guests/list',[GuestController::class,'index']);
Route::get('guests/{id}',[GuestController::class,'show']);
Route::get('guests_list/menu_icon',[GuestController::class,'guests_menu_icon']);

//users
Route::get('users',[UserController::class,'index']);
Route::get('users/list',[UserController::class,'index']);
Route::get('users/login',[UserController::class,'LoginForm']);
Route::post('users/login',[UserController::class,'login']);
Route::get('users/logout',[UserController::class,'logout']);
Route::get('users/create',[UserController::class,'create_form']);
Route::post('users/create',[UserController::class,'create']);
Route::get('users/detail/{id}',[UserController::class,'show']);
Route::get('users/edit/{id}',[UserController::class,'edit']);
Route::post('users/edit/{id}',[UserController::class,'update']);
Route::get('users/delete/{id}',[UserController::class,'delete']);
Route::post('users/search',[UserController::class,'search']);
Route::get('users/menu_icon',[UserController::class,'users_menu_icon']);

//rooms
Route::get('rooms',[RoomController::class,'index']);
Route::get('rooms/list',[RoomController::class,'index']);
Route::get('rooms/detail/{id}',[RoomController::class,'show']);
Route::get('rooms/create',[RoomController::class,'create']);
Route::post('rooms',[RoomController::class,'store']);
Route::get('rooms/edit/{id}',[RoomController::class,'edit']);
Route::post('rooms/edit/{id}',[RoomController::class,'update']);
Route::get('rooms/menu_icon',[RoomController::class,'rooms_menu_icon']);

//room types
Route::get('roomtypes',[RoomTypeController::class,'index']);
Route::post('roomtypes',[RoomTypeController::class,'store']);
Route::get('roomtypes/create',[RoomTypeController::class,'create']);
Route::get('roomtypes/edit/{id}',[RoomTypeController::class,'edit']);
Route::post('roomtypes/edit/{id}',[RoomTypeController::class,'update']);