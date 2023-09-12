@extends('Templates.main_templates.main_template_parent')

@section('main_content')
	<div class="container">
		<!-- Information (tell what's happened) -->
		@if(session('info'))
			<h3 class="login_header">{{ session('info') }}</h3>
		@endif
		@include('partials.users.form')
	<div>
@endsection
