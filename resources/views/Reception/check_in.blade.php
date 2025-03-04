@extends('Templates.sub_templates.reception')

@section('reception')
    alive
@endsection

@section('reception-check-in-list-underline')
    sub_menus_active
@endsection

@section('reception-check-in-list')
    sub_menu_anchor_active
@endsection

@section('sub_content')
	@component('partials.reception.guest_list')
        @slot('guests', $guests)
        @slot('title')
            check_in
        @endslot
    @endcomponent
@endsection
