<!-- header icon and title -->
<h3 class="header_icon_for_larger_screens">
    <img src="{{asset('icon/person-circle.png')}}" alt="Bootstrap" width="32" height="32" class="header_icon"></img>
    Users
</h3>
<!-- header icon (for mobile view) -->
<h3 class="header_icon_for_mobile_screens">
    <img src="{{asset('icon/person-circle.png')}}" alt="Bootstrap" width="32" height="32" class="header_icon"></img>
</h3>
<!-- menu icon for menu pop up box (for mobile view) -->
<div class="menu_icon">
    <img src="{{asset('icon/card-list.png')}}" alt="Bootstrap" width="32" height="32"></img>
</div>
<!-- menu pop up box (for mobile view) -->
<div class="wrap_sub_menu_mobile">
    <div class="arrow_wrap_mobile"></div>
    <div class="sub_menu_mobile">
        <div>
			<div class="sub_menus_mobile  @yield('user_list_active_menu')" id="body">
				<a href="/users/list" class=" @yield('user_list_active')">List</a>
			</div>
			<div class="sub_menus_mobile @yield('user_active_menu')" id="body">
				<a href="/users/create" class="@yield('user_active')">Create</a>
			</div>
        </div>
    </div>
</div>
<div class="wrap_sub_menu_and_detail_info">
	<!-- menu category -->
    <div class="sub_menu col-md-3 col-sm-12">
        <div class="sub_menus @yield('user_list_active_menu')" id="body">
            <a href="/users/list" class="sub_menu_anchor @yield('user_list_active')">User List</a>
        </div>
        <div class="sub_menus @yield('user_active_menu')" id="body">
            <a href="/users/create" class="sub_menu_anchor @yield('user_active')">Create User</a>
        </div>
        @yield('user-list')
    </div>
    <div class="detail_info col-md-9 col-sm-12 col-xs-12">
        {{ $content }}
    </div>
</div>
