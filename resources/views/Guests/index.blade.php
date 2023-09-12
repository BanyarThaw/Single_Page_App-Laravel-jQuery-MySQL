@extends('Templates.sub_templates.guests')

@section('guests')
    alive
@endsection

@section('sub_content')
    @include('partials.guest.guest_list')
@endsection
