@extends('Templates.sub_templates.users')

@section('users')
    alive
@endsection

@section('user_active')
    sub_menu_anchor_active
@endsection

@section('user_active_menu')
    sub_menus_active
@endsection

@section('sub_content')
    @include('partials.users.create')
@endsection
