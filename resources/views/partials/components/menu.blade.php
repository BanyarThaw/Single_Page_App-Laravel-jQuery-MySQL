<!-- desktop and larger screen views (header menu category) -->
<div class="menus">
    <div class="reception">
        <div class="reception_hover" id="header">
            <a href="/reception" class="menus_anchor" id="menus_anchor">
                <img src="{{asset('icon/shop.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
                Reception
            </a>
        </div>
    </div>
    <div class="arrow_wrap @yield('reception')" id="reception"> 
        <div class="arrow_one"></div>
        <div class="arrow_two"></div>
    </div>
</div>
<div class="menus">
    <div class="guest">
        <div class="guest_hover" id="header">
            <a href="/guests" class="menus_anchor" id="menus_anchor">
                <img src="{{asset('icon/people-fill.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
                Guest
            </a>
        </div>
    </div>
    <div class="arrow_wrap @yield('guests')" id="guests"> 
        <div class="arrow_one"></div>
        <div class="arrow_two"></div>
    </div>
</div>
<div class="menus">
    <div class="user">
        <div class="user_hover" id="header">
            <a href="/users" class="menus_anchor" id="menus_anchor">
                <img src="{{asset('icon/person-circle.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
                Users
            </a>
        </div>
    </div>
    <div class="arrow_wrap @yield('users')" id="users"> 
        <div class="arrow_one"></div>
        <div class="arrow_two"></div>
    </div>
</div>
<div class="menus">
    <div class="room">
        <div class="room_hover" id="header">
            <a href="/rooms" class="menus_anchor" id="menus_anchor">
                <img src="{{asset('icon/door-closed.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
                Rooms
            </a>
        </div>
    </div>
    <div class="arrow_wrap @yield('rooms')" id="rooms"> 
        <div class="arrow_one"></div>
        <div class="arrow_two"></div>
    </div>
</div>
<!-- normal mobile view,mobile landscape view,tablet view (header menu category) -->
<div class="menus_mobile" id="header">
    <a href="/reception" class="menus_anchor" id="menus_anchor">
        <img src="{{asset('icon/shop.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
    </a>
    <div class="arrow_wrap @yield('reception')" id="reception_mobile"> 
        <div class="arrow_one_mobile"></div>
        <div class="arrow_two_mobile"></div>
    </div>
</div>
<div class="menus_mobile" id="header">
    <a href="/guests" class="menus_anchor" id="menus_anchor">
        <img src="{{asset('icon/people-fill.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
    </a>
    <div class="arrow_wrap  @yield('guests')" id="guests_mobile"> 
        <div class="arrow_one_mobile"></div>
        <div class="arrow_two_mobile"></div>
    </div>
</div>
<div class="menus_mobile" id="header">
    <a href="/users" class="menus_anchor" id="menus_anchor">
        <img src="{{asset('icon/person-circle.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
    </a>
    <div class="arrow_wrap @yield('users')" id="users_mobile"> 
        <div class="arrow_one_mobile"></div>
        <div class="arrow_two_mobile"></div>
    </div>
</div>
<div class="menus_mobile" id="header">
    <a href="/rooms" class="menus_anchor" id="menus_anchor">
        <img src="{{asset('icon/door-closed.png')}}" alt="Bootstrap" width="20" height="20" class="main_header_icon"></img>
    </a>
    <div class="arrow_wrap @yield('rooms')" id="rooms_mobile"> 
        <div class="arrow_one_mobile"></div>
        <div class="arrow_two_mobile"></div>
    </div>
</div>