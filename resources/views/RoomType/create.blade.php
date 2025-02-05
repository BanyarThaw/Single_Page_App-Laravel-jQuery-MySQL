@extends('Templates.sub_templates.rooms')

@section('rooms')
    alive
@endsection

@section('room_type_active')
    sub_menu_anchor_active
@endsection

@section('room_type_active_menu')
    sub_menus_active
@endsection

@section('sub_content')
    @include('partials.roomtype.create')
@endsection
