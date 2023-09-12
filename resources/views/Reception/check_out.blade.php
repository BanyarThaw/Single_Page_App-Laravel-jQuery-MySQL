@extends('Templates.sub_templates.reception')

@section('reception')
    alive
@endsection

@section('reception-check-out-underline')
    sub_menus_active
@endsection

@section('reception-check-out')
    sub_menu_anchor_active
@endsection

@section('sub_content')
	@component('partials.reception.guest_list')
        @slot('guests', $guests)
        @slot('title')
            check_out
        @endslot
    @endcomponent
@endsection