@extends('Templates.sub_templates.rooms')

@section('rooms')
    alive
@endsection

@section('sub_content')
    @include('partials.roomtype.roomtype_list')
@endsection
