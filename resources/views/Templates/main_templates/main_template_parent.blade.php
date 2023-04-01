<!Doctype html>
<html>
	<head>
		<title>Web Application</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/loader.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/dot-collision.css')}}">
	<link rel="icon" type="image/png" href="{{asset('photos/logo.jpg')}}" />
	<body>
        @yield('main_content')
        <!-- common -->
		<script src="{{asset('js/common/pre_loading.js')}}"></script>
		<script src="{{asset('js/common/jquery.js')}}"></script>
		<script src="{{asset('js/common/jquery.ChangeUrl.js')}}"></script>
		<script src="{{asset('js/common/active.js')}}"></script>
		<script src="{{asset('js/common/toggle.js')}}"></script>
		<script src="{{asset('js/common/ajax_pagination.js')}}"></script>
		<script src="{{asset('js/common/live_search.js')}}"></script>
		<script src="{{asset('js/common/header.js')}}"></script>
		<script src="{{asset('js/common/body.js')}}"></script>
		<script src="{{asset('js/common/show.js')}}"></script>
		<script src="{{asset('js/common/login.js')}}"></script>
		<script src="{{asset('js/common/logout.js')}}"></script>
		<!-- reception -->
		<script src="{{asset('js/reception/check_in.js')}}"></script>
		<script src="{{asset('js/reception/check_out.js')}}"></script>
		<!-- users -->
		<script src="{{asset('js/users/create_user.js')}}"></script>
		<script src="{{asset('js/users/edit_user.js')}}"></script>
		<script src="{{asset('js/users/delete_user.js')}}"></script>
		<!-- rooms -->
		<script src="{{asset('js/rooms/create_room.js')}}"></script>
		<script src="{{asset('js/rooms/edit_room.js')}}"></script>
		<!-- roomtypes -->
		<script src="{{asset('js/roomtypes/edit_roomtype.js')}}"></script>
		<script src="{{asset('js/roomtypes/create_roomtype.js')}}"></script>
	</body>
</html>