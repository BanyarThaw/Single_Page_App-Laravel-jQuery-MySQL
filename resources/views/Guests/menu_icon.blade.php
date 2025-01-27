@extends('Templates.sub_templates.guests')

@section('sub_content')
    <div>
        <div class="sub_menus_mobile" id="body">
            <a href="{{ route('guests.list') }}">Guest List</a>
        </div>
    </div>
@endsection
