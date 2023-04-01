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
<div id="myModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
		<span class="close">&times;</span>
		<div></div>
	</div>
</div>
<div class="wrap">
    <div class="wrap_menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="header col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Web Application</h3>
            <div class="wrap_logout">
				<!-- user info and logout button -->
                <div class="logout">
                    <div class="show">
                        <a href="/users/detail/{{Auth::user()->id}}" class="detail_anchor" id="myBtn">
                            <img src="{{asset('icons/person-circle.svg')}}" alt="Bootstrap" width="32" height="32"></img>
                        </a>
                    </div>
                    &nbsp;&nbsp;
                    <a href="/users/logout" title="logout" class="logout_button">
						<img src="{{asset('icons/power.svg')}}" alt="Bootstrap" width="32" height="32"></img>
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
							<img src="{{asset('icons/shop.svg')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
							Reception
						</a>
					</div>
                </div>
                <div class="arrow_wrap alive" id="reception"> 
                    <div class="arrow_one"></div>
                    <div class="arrow_two"></div>
                </div>
            </div>
            <div class="menus">
                <div class="guest">
					<div class="guest_hover" id="header">
						<a href="/guests" class="menus_anchor" id="menus_anchor">
							<img src="{{asset('icons/people-fill.svg')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
							Guest
						</a>
					</div>
                </div>
                <div class="arrow_wrap" id="guests"> 
                    <div class="arrow_one"></div>
                    <div class="arrow_two"></div>
                </div>
            </div>
            <div class="menus">
                <div class="user">
					<div class="user_hover" id="header">
						<a href="/users" class="menus_anchor" id="menus_anchor">
							<img src="{{asset('icons/person-circle.svg')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
							Users
						</a>
					</div>
                </div>
                <div class="arrow_wrap" id="users"> 
                    <div class="arrow_one"></div>
                    <div class="arrow_two"></div>
                </div>
            </div>
            <div class="menus">
                <div class="room">
					<div class="room_hover" id="header">
						<a href="/rooms" class="menus_anchor" id="menus_anchor">
							<img src="{{asset('icons/door-closed.svg')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
							Rooms
						</a>
					</div>
                </div>
                <div class="arrow_wrap" id="rooms"> 
                    <div class="arrow_one"></div>
                    <div class="arrow_two"></div>
                </div>
            </div>
            <!-- normal mobile view,mobile landscape view,tablet view (header menu category) -->
            <div class="menus_mobile" id="header">
                <a href="/reception" class="menus_anchor" id="menus_anchor">
                    <img src="{{asset('icons/shop.svg')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
                </a>
				<div class="arrow_wrap alive" id="reception_mobile"> 
					<div class="arrow_one_mobile"></div>
					<div class="arrow_two_mobile"></div>
				</div>
            </div>
            <div class="menus_mobile" id="header">
				<a href="/guests" class="menus_anchor" id="menus_anchor">
					<img src="{{asset('icons/people-fill.svg')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
				</a>
				<div class="arrow_wrap" id="guests_mobile"> 
					<div class="arrow_one_mobile"></div>
					<div class="arrow_two_mobile"></div>
				</div>
            </div>
            <div class="menus_mobile" id="header">
				<a href="/users" class="menus_anchor" id="menus_anchor">
					<img src="{{asset('icons/person-circle.svg')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
				</a>
				<div class="arrow_wrap" id="users_mobile"> 
					<div class="arrow_one_mobile"></div>
					<div class="arrow_two_mobile"></div>
				</div>
            </div>
            <div class="menus_mobile" id="header">
				<a href="/rooms" class="menus_anchor" id="menus_anchor">
					<img src="{{asset('icons/door-closed.svg')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
				</a>
				<div class="arrow_wrap" id="rooms_mobile"> 
					<div class="arrow_one_mobile"></div>
					<div class="arrow_two_mobile"></div>
				</div>
            </div>
            <div class="main_body col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- header icon and title -->
                <h3 class="header_icon_for_larger_screens">
                    <img src="{{asset('icons/shop.svg')}}" alt="Bootstrap" width="32" height="32" class="header_icon"></img>
                    Reception
                </h3>
				<!-- header icon (for mobile view) -->
                <h3 class="header_icon_for_mobile_screens">
                    <img src="{{asset('icons/shop.svg')}}" alt="Bootstrap" width="32" height="32" class="header_icon"></img>
                </h3>
				<!-- menu icon for menu pop up box (for mobile view) --> 
                <div class="menu_icon">
                    <a href="/reception/menu_icon">
			            <img src="{{asset('icons/card-list.svg')}}" alt="Bootstrap" width="32" height="32"></img>
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
                        <div class="sub_menus sub_menus_active" id="body">
                            <a href="/reception/create" class="sub_menu_anchor_active">Create Check-in</a>
                        </div>
                        <div class="sub_menus" id="body">
                            <a href="/reception/check_in" class="sub_menu_anchor">Check-in List</a>
                        </div>
                        <div class="sub_menus" id="body">
                            <a href="/reception/check_out" class="sub_menu_anchor">Check-out List</a>
                        </div>
                    </div>
                    <div class="detail_info col-md-9 col-sm-12 col-xs-12">
                        <div class="reception_create_wrap">
							<!-- each respective category title name -->
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-3 col-sm-3 reception_detail_info_header">
                                    <h4>Create Check-in</h4>
                                </div>
                                <div class="col-md-3 col-sm-3 reception_detail_info_header2">
                                    <h4>Create</h4>
                                </div>
                                <div class="reception_header_for_small_screens">
                                    <h4 class="reception_header_for_small_screens_create">Create</h4>
                                </div>
                            </div>
                            <br>
                            <!-- desktop and larger screens view -->
                            <form action="/reception" method="post">
                                <div class="reception_input_data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="type" value="desktop_&_larger_screens">
                                    <div class="col-md-12 col-sm-12" id="wrap_input_data">
                                        <div class="col-md-6 col-sm-6 input_data">
                                            <div class="col-md-4 col-sm-4" id="input_data">
                                                <p>
													Guest Name :
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-sm-8" id="input_data">
                                                <input type="text" name="guest_name" class="guest_name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 input_data">
                                            <div class="col-md-3 col-sm-4" id="input_data">
                                                <p>
													NRC :
                                                </p>
                                            </div>
                                            <div class="col-md-9 col-sm-8" id="input_data">
                                                <input type="text" name="nrc" class="nrc" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 input_data">
                                            <div class="col-md-4 col-sm-4" id="input_data">
                                                <p>
													Email :
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-sm-8" id="input_data">
                                                <input type="text" name="email" class="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 input_data">
                                            <div class="col-md-3 col-sm-4" id="input_data">
                                                <p>
													Phone :
                                                </p>
                                            </div>
                                            <div class="col-md-9 col-sm-8" id="input_data">
                                                <input type="number" name="phone" class="phone" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 input_data">
                                            <div class="col-md-4 col-sm-4" id="input_data">
                                                <p>
                                                    Adult :
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-sm-8" id="input_data">
                                                <input type="number" name="adult" class="adult" placeholder="number only" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 input_data">
                                            <div class="col-md-3 col-sm-4" id="input_data">
                                                Child :
                                            </div>
                                            <div class="col-md-9 col-sm-8" id="input_data">
                                                <input type="number" name="child" class="child" placeholder="number only" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="col-md-6 col-sm-6 input_data" id="input_data">
                                            <div class="col-md-3 col-sm-4" id="input_data2">
                                                <p>
                                                    Address :
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-sm-8" id="input_data">
                                                <input type="text" name="address" class="address" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 input_data">
                                            <div class="col-md-3 col-sm-4" id="input_data3">
                                                Room :
                                            </div>
                                            <div class="col-md-8 col-sm-8" id="input_data">
                                                <select name="room" id="input_data4" class="room reception_create_select">
                                                    <option value="">Choose</option>
                                                    @foreach($rooms as $room)
                                                        <option value="{{$room->id}}">{{$room->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12" id="reception_submit_button">
                                        <div class="reception_submit_button" id="reception">
                                            <button type="submit">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            <!-- normal mobile view,mobile landscape view,tablet view -->
                            <form action="/reception" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="type" value="mobile_screens">
                                <div class="col-md-12 col-sm-12" id="user_input_data_form">
                                    <div class="user_input_data">
                                        <div class="col-md-12 col-sm-12" id="user_input_data_detail">
                                            <div class="col-md-3 col-sm-12">
                                                Guest Name :
                                            </div>
                                            <div class="col-md-9 col-sm-12">
                                                <input type="text" name="guest_name" class="guest_name" id="user_input_data_detail_2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user_input_data">
                                        <div class="col-md-12 col-sm-12" id="user_input_data_detail">
                                            <div class="col-md-3 col-sm-12">
                                                NRC :
                                            </div>
                                            <div class="col-md-9 col-sm-12">
                                                <input type="text" name="nrc_" class="nrc" id="user_input_data_detail_2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user_input_data">
                                        <div class="col-md-12 col-sm-12" id="user_input_data_detail">
                                            <div class="col-md-3 col-sm-12">
                                                Email :
                                            </div>
                                            <div class="col-md-9 col-sm-12">
                                                <input type="email" name="email" class="email" id="user_input_data_detail_2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user_input_data">
                                        <div class="col-md-12 col-sm-12" id="user_input_data_detail">
                                            <div class="col-md-3 col-sm-12">
                                                Phone :
                                            </div>
                                            <div class="col-md-9 col-sm-12">
                                                <input type="number" name="phone" class="phone" id="user_input_data_detail_2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user_input_data">
                                        <div class="col-md-12 col-sm-12" id="user_input_data_detail">
                                            <div class="col-md-3 col-sm-12">
                                                Adult :
                                            </div>
                                            <div class="col-md-9 col-sm-12">
                                                <input type="number" name="adult" class="adult" placeholder="number only" id="user_input_data_detail_2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user_input_data">
                                        <div class="col-md-12 col-sm-12" id="user_input_data_detail">
                                            <div class="col-md-3 col-sm-12">
                                                Child :
                                            </div>
                                            <div class="col-md-9 col-sm-12">
                                                <input type="number" name="child" class="child" placeholder="number only" id="user_input_data_detail_2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user_input_data">
                                        <div class="col-md-12 col-sm-12" id="user_input_data_detail">
                                            <div class="col-md-3 col-sm-12">
                                                Address :
                                            </div>
                                            <div class="col-md-9 col-sm-12">
                                                <input type="text" name="address" class="address" id="user_input_data_detail_2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 input_data">
                                        <div class="col-md-3 col-sm-4" id="input_data3">
                                            Room :
                                        </div>
                                        <div class="col-md-8 col-sm-8" id="input_data">
                                            <select name="room" id="input_data4" class="room reception_create_select">
                                                <option value="">Choose</option>
                                                @foreach($rooms as $room)
                                                    <option value="{{$room->id}}">{{$room->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12" id="reception_submit_button">
                                        <div class="reception_submit_button" id="reception">
                                            <button type="submit">Create</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12" id="user_submit_button_mobile">
                                        <br>
                                        <div id="reception">
                                            <button type="submit">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>