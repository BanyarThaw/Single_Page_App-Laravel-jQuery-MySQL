@extends('Templates.main_templates.main_template')

@section('content')
	<!-- Information (tell what's happened) -->
    @if(session('info'))
        <h3>{{ session('info') }}</h3>
    @endif
	<!-- header icon and title -->
    <h3 class="header_icon_for_larger_screens">
        <img src="{{asset('icons/shop.png')}}" alt="Bootstrap" width="32" height="32" class="header_icon"></img>
        Reception
    </h3>
	<!-- header icon (for mobile view) -->
    <h3 class="header_icon_for_mobile_screens">
        <img src="{{asset('icons/shop.png')}}" alt="Bootstrap" width="32" height="32" class="header_icon"></img>
    </h3>
	<!-- menu icon for menu pop up box (for mobile view) --> 
    <div class="menu_icon">
		<a href="/reception/menu_icon">
			<img src="{{asset('icons/card-list.png')}}" alt="Bootstrap" width="32" height="32"></img>
		</a>
    </div>
	<!-- menu pop up box (for mobile view) -->
    <div class="wrap_sub_menu_mobile">
        <div class="arrow_wrap_mobile"></div>
        <div class="sub_menu_mobile">
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
        </div>
    </div>
    <div class="wrap_sub_menu_and_detail_info">
		<!-- menu category -->
		<div class="sub_menu col-md-3 col-sm-3 col-xs-3">
			<div class="sub_menus {{ $under_line_style_create }}" id="body">
				<a href="/reception/create" class="{{ $sub_title_create }}">Create Check-in</a>
			</div>
			<div class="sub_menus {{ $under_line_style_check_in }}" id="body">
				<a href="/reception/check_in" class="{{ $sub_title_check_in }}">Check-in List</a>
			</div>
			<div class="sub_menus {{ $under_line_style_check_out }}" id="body">
				<a href="/reception/check_out" class="{{ $sub_title_check_out }}">Check-out List</a>
			</div>
		</div>
		<div class="detail_info col-md-9 col-sm-12 col-xs-12">
			@yield('sub_content')
		</div>
    </div>
@endsection
