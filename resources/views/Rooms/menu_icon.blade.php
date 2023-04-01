@extends('Templates.sub_templates.rooms')

@section('sub_content')
    <div>
        <div class="sub_menus_mobile" id="body">
            <a href="/rooms/list">Room List</a>
        </div>
        <div class="sub_menus_mobile" id="body">
            <a href="/rooms/create">Create Room</a>
        </div>
        <div class="sub_menus_mobile" id="body">
            <a href="/roomtypes">RoomTypes</a>
        </div>
        <div class="sub_menus_mobile" id="body">
            <a href="/roomtypes/create">Create RoomType</a>
        </div>
    </div>
@endsection