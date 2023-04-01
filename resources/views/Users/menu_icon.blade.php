@extends('Templates.sub_templates.users')

@section('sub_content')
    <div>
        <div class="sub_menus_mobile" id="body">
            <a href="/users/list">List</a>
        </div>
        <div class="sub_menus_mobile" id="body">
            <a href="/users/create">Create</a>
        </div>
    </div>
@endsection