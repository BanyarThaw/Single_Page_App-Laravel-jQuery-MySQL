@extends('Templates.sub_templates.reception')

@section('reception')
    alive
@endsection

@section('sub_content')
    <div>
        <div class="sub_menus_mobile" id="body">
            <a href="/reception/create">Create</a>
        </div>
        <div class="sub_menus_mobile" id="body">
            <a href="/reception/check_in">Check In</a>
        </div>
        <div class="sub_menus_mobile" id="body">
            <a href="/reception/check_out">Check Out</a>
        </div>
    </div>
@endsection