@extends('Templates.main_templates.main_template_parent')

@section('main_content')
    <div class="container">
		<!-- message dialog box -->
		<div class="modal_2">
			<!-- Modal content -->
			<div class="modal-content_2">
				<div class="message_dialog"></div>
			</div>
		</div>
		<!-- The loader -->
		<div id="loader-container">
			<div id="loader" class="center"></div>
		</div>
		<!-- The Modal -->
		<div id="myModal" class="modal" class="overflow-auto">
			<!-- Modal content -->
			<div class="modal-content" class="overflow-auto">
				<span class="close">&times;</span>
				<div></div>
			</div>
		</div>
		<div class="wrap">
			<div class="wrap_menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="header col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h3>Web Application</h2>
					<div class="wrap_logout">
						<!-- user info and logout button -->
						<div class="logout">
							<div class="show">
								<a href="/users/detail/{{Auth::user()->id}}" class="detail_anchor" id="myBtn">
									<img src="{{asset('icons/person-circle.png')}}" alt="Bootstrap" width="32" height="32"></img>
								</a>
							</div>
							&nbsp;&nbsp;
							<a href="/users/logout" title="logout" class="logout_button">
								<img src="{{asset('icons/power.png')}}" alt="Bootstrap" width="32" height="32"></img>
							</a>
						</div>
					</div>
				</div>
				<div class="menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- desktop and larger screen views (header menu category) -->
					<div class="menus">
						<div class="reception">
							<div class="reception_hover" id="header">
								<a href="/reception" class="menus_anchor" id="menus_anchor">
									<img src="{{asset('icons/shop.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
									Reception
								</a>
							</div>
						</div>
						<div class="arrow_wrap {{ $main_title_reception }}" id="reception"> 
							<div class="arrow_one"></div>
							<div class="arrow_two"></div>
						</div>
					</div>
					<div class="menus">
						<div class="guest">
							<div class="guest_hover" id="header">
								<a href="/guests" class="menus_anchor" id="menus_anchor">
									<img src="{{asset('icons/people-fill.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
									Guest
								</a>
							</div>
						</div>
						<div class="arrow_wrap {{ $main_title_guest }}" id="guests"> 
							<div class="arrow_one"></div>
							<div class="arrow_two"></div>
						</div>
					</div>
					<div class="menus">
						<div class="user">
							<div class="user_hover" id="header">
								<a href="/users" class="menus_anchor" id="menus_anchor">
									<img src="{{asset('icons/person-circle.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
									Users
								</a>
							</div>
						</div>
						<div class="arrow_wrap {{ $main_title_user }}" id="users"> 
							<div class="arrow_one"></div>
							<div class="arrow_two"></div>
						</div>
					</div>
					<div class="menus">
						<div class="room">
							<div class="room_hover" id="header">
								<a href="/rooms" class="menus_anchor" id="menus_anchor">
									<img src="{{asset('icons/door-closed.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
									Rooms
								</a>
							</div>
						</div>
						<div class="arrow_wrap {{ $main_title_room }}" id="rooms"> 
							<div class="arrow_one"></div>
							<div class="arrow_two"></div>
						</div>
					</div>
					<!-- normal mobile view,mobile landscape view,tablet view (header menu category) -->
					<div class="menus_mobile" id="header">
						<a href="/reception" class="menus_anchor" id="menus_anchor">
							<img src="{{asset('icons/shop.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
						</a>
						<div class="arrow_wrap {{ $main_title_reception }}" id="reception_mobile"> 
							<div class="arrow_one_mobile"></div>
							<div class="arrow_two_mobile"></div>
						</div>
					</div>
					<div class="menus_mobile" id="header">
						<a href="/guests" class="menus_anchor" id="menus_anchor">
							<img src="{{asset('icons/people-fill.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
						</a>
						<div class="arrow_wrap {{ $main_title_guest }}" id="guests_mobile"> 
							<div class="arrow_one_mobile"></div>
							<div class="arrow_two_mobile"></div>
						</div>
					</div>
					<div class="menus_mobile" id="header">
						<a href="/users" class="menus_anchor" id="menus_anchor">
							<img src="{{asset('icons/person-circle.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
						</a>
						<div class="arrow_wrap {{ $main_title_user }}" id="users_mobile"> 
							<div class="arrow_one_mobile"></div>
							<div class="arrow_two_mobile"></div>
						</div>
					</div>
					<div class="menus_mobile" id="header">
						<a href="/rooms" class="menus_anchor" id="menus_anchor">
							<img src="{{asset('icons/door-closed.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
						</a>
						<div class="arrow_wrap {{ $main_title_room }}" id="rooms_mobile"> 
							<div class="arrow_one_mobile"></div>
							<div class="arrow_two_mobile"></div>
						</div>
					</div>
					<div class="main_body col-lg-12 col-md-12 col-sm-12 col-xs-12">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection