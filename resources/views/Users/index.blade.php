@extends('Templates.sub_templates.users')

@section('users')
    alive
@endsection

@section('sub_content')
    @include('partials.users.list')
@endsection
