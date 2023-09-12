@extends('Templates.sub_templates.reception')

@section('reception')
    alive
@endsection

@section('reception-check-in-underline')
    sub_menus_active
@endsection

@section('reception-check-in')
    sub_menu_anchor_active
@endsection

@section('sub_content')
    @include('partials.reception.guest_create')
@endsection
