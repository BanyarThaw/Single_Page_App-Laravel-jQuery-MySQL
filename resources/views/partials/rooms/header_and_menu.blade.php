<!-- header icon and title -->
<h3 class="header_icon_for_larger_screens">
    <img src="{{asset('icon/door-closed.png')}}" alt="Bootstrap" width="32" height="32" class="header_icon"></img>
    Rooms
</h3>
<!-- header icon (for mobile view) -->
<h3 class="header_icon_for_mobile_screens">
    <img src="{{asset('icon/door-closed.png')}}" alt="Bootstrap" width="32" height="32" class="header_icon"></img>
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
            <div class="sub_menus_mobile" id="body">
                <a href="/rooms/list">Room List</a>
            </div>
            <div class="sub_menus_mobile @yield('room_active_menu')" id="body">
                <a href="/rooms/create" class="@yield('room_active')" >Create Room</a>
            </div>
            <div class="sub_menus_mobile" id="body">
                <a href="/roomtypes">RoomTypes</a>
            </div>
            <div class="sub_menus_mobile" id="body">
                <a href="/roomtypes/create">Create RoomType</a>
            </div>
        </div>
    </div>
</div>
<div class="wrap_sub_menu_and_detail_info">
    <!-- menu category -->
    <div class="sub_menu col-md-3 col-sm-3">
        <div class="sub_menus @yield('room_list_active_menu') " id="body">
            <a href="/rooms/list" class="sub_menu_anchor @yield('room_list_active')">Room List</a>
        </div>
        <div class="sub_menus @yield('room_active_menu')" id="body">
            <a href="/rooms/create" class="sub_menu_anchor @yield('room_active')">Create Room</a>
        </div>
        <div class="sub_menus @yield('room_type_list_active_menu')" id="body">
            <a href="/roomtypes" class="sub_menu_anchor @yield('room_type_list_active')">Room Types</a>
        </div>
        <div class="sub_menus @yield('room_type_active_menu')" id="body">
            <a href="/roomtypes/create" class="sub_menu_anchor @yield('room_type_active')">Create Room Type</a>
        </div>
    </div>
    <div class="detail_info col-md-9 col-sm-12 col-xs-12">
        {{ $content }}
    </div>
</div>

