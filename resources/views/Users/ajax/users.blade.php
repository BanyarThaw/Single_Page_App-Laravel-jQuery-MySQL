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
    <a href="/reception/menu_icon">
        <img src="{{asset('icon/card-list.png')}}" alt="Bootstrap" width="32" height="32"></img>
    </a>
</div>
<!-- menu pop up box (for mobile view) -->
<div class="wrap_sub_menu_mobile">
    <div class="arrow_wrap_mobile"></div>
    <div class="sub_menu_mobile">
        <div>
			<div class="sub_menus_mobile" id="body">
				<a href="/users/list">List</a>
			</div>
			<div class="sub_menus_mobile" id="body">
				<a href="/users/create">Create</a>
			</div>
        </div>
    </div>
</div>
<div class="wrap_sub_menu_and_detail_info">
	<!-- menu category -->
    <div class="sub_menu col-md-3 col-sm-12">
        <div class="sub_menus sub_menus_active" id="body">
            <a href="/users/list" class="sub_menu_anchor_active">User List</a>
        </div>
        <div class="sub_menus" id="body">
            <a href="/users/create" class="sub_menu_anchor">Create User</a>
        </div>
    </div>
    <div class="detail_info col-md-9 col-sm-12 col-xs-12">
		<!-- each respective category title name -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-3 col-sm-3 col-xs-3 detail_info_header">
                <h4>User List</h4>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 detail_info_header_mobile">
                <h4>List</h4>
            </div>
            <h4 class="mobile_title">List</h4>
        </div>
        <!-- words limit checking -->
        @php
			$words_count = "\App\Http\Controllers\WordsLimitController";
        @endphp
        <!-- tablet,desktop and larger screens view -->
        <div class="col-md-12 col-sm-12 col-xs-12 user_list_table_desktop">
            <div class="col-md-3 col-sm-3 col-xs-4 date">
                Date
            </div>
            <div class="col-md-9 col-sm-9 col-xs-8 name">
                Name
            </div>
            @foreach($users as $user)
                <div class="col-md-3 col-sm-3 col-xs-4 date">
                    {{ $user->created_at->format('j.n.Y') }}
                </div>
                <div class="col-md-9 col-sm-9 col-xs-8 name">
                    @if(Auth::user()->id == $user->id)
                        <b>
                            <a href="/users/detail/{{$user->id}}" id="current_user_detail_anchor" class="detail_anchor" id="myBtn">
                                @php $words_limit = $words_count::words_limit($user->name); echo $words_limit; @endphp
                            </a>
                        </b>
                    @else
                        <a href="/users/detail/{{$user->id}}" class="detail_anchor" id="myBtn">
                            @php $words_limit = $words_count::words_limit($user->name); echo $words_limit; @endphp
                        </a>
                    @endif
                    <a href="/users/delete/{{ $user->id }}" class="anchor_check_out_2 delete_user">
                        <img src="{{asset('icon/trash-fill.png')}}" alt="Bootstrap" width="15" height="15"></img>
                    </a>
                    <a href="/users/edit/{{ $user->id }}" class="anchor_edit detail_anchor">
                        <img src="{{asset('icon/pencil-square.png')}}" alt="Bootstrap" width="15" height="15"></img>
                    </a>
                </div>
            @endforeach
        </div>
        <!-- normal mobile view,mobile landscape view,tablet view -->
		<div class="col-xs-12 user_list_mobile">
            <div class="border_top"></div>
            @foreach($users as $user)
                <div class="reception_user_list_mobile_detail">
                    <h5 class="date_format_mobile">{{ $user->created_at->format('d.n.Y') }}</h5>
                    @if(Auth::user()->id == $user->id)
                        <a href="/users/detail/{{$user->id}}" id="current_user_detail_anchor" class="detail_anchor" id="myBtn">
                            <p class="name_mobile">@php $words_limit = $words_count::words_limit($user->name); echo $words_limit; @endphp</p>
                        </a>
                    @else
                        <a href="/users/detail/{{$user->id}}" class="detail_anchor" id="myBtn">
                            <p class="name_mobile">@php $words_limit = $words_count::words_limit($user->name); echo $words_limit; @endphp</p>
                        </a>
                    @endif
                    <br>
                    <a href="/users/delete/{{ $user->id }}" class="delete_user delete_user_button">
                        <img src="{{asset('icon/trash-fill.png')}}" alt="Bootstrap" width="20" height="20"></img>
                    </a>
                    <a href="/users/edit/{{ $user->id }}" class="detail_anchor edit_user_button">
                        <img src="{{asset('icon/pencil-square.png')}}" alt="Bootstrap" width="20" height="20"></img>
                    </a>
                </div>
                <br>
            @endforeach
        </div>
		<!-- search form -->
        <div class="user_search_form">
            <form action="/users/search" method="post" autocomplete="off">
                {{ csrf_field() }}
                <input type="text" name="search" placeholder="Search Name" class="ajax_user_list" id="Search" autocomplete="false">
            </form>
            <div id="search_results">
				<!-- live search effect -->
                <div class="snippet">
                    <div class="stage">
                        <div class="dot-collision"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>