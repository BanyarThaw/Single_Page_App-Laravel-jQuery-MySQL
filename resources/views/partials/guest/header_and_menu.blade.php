<!-- header icon and title -->
<h3 class="header_icon_for_larger_screens">
    <img src="{{asset('icon/people-fill.png')}}" alt="Bootstrap" width="32" height="32" class="header_icon"></img>
    Guests
</h3>
<!-- header icon (for mobile view) -->
<h3 class="header_icon_for_mobile_screens">
    <img src="{{asset('icon/people-fill.png')}}" alt="Bootstrap" width="32" height="32" class="header_icon"></img>
</h3>
<!-- menu icon for menu pop up box (for mobile view) -->
<div class="menu_icon">
    <a href="{{ route('guests.menu_icon') }}">
        <img src="{{asset('icon/card-list.png')}}" alt="Bootstrap" width="32" height="32"></img>
    </a>
</div>
<!-- menu pop up box (for mobile view) -->
<div class="wrap_sub_menu_mobile">
    <div class="arrow_wrap_mobile"></div>
    <div class="sub_menu_mobile">
        <div>
            <div class="sub_menus_mobile" id="body">
                <a href="{{ route('guests.list') }}">Guest List</a>
            </div>
        </div>
    </div>
</div>
<div class="wrap_sub_menu_and_detail_info">
    <!-- menu category -->
    <div class="sub_menu col-md-3 col-sm-3 ">
        <div class="sub_menus sub_menus_active" id="body">
            <a href="{{ route('guests.list') }}" class="sub_menu_anchor_active">Guest List</a>
        </div>
    </div>
    <div class="detail_info col-md-9 col-sm-12 col-xs-12" id="guest_detail_info">
        {{ $content }}
    </div>
</div>
