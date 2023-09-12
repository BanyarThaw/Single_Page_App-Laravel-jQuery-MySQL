@extends('Templates.main_templates.main_template')

@section('content')
	@component('partials.reception.header_and_menu')
        @slot('content')
			@yield('sub_content')
        @endslot
    @endcomponent
@endsection
