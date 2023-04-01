@extends('Templates.sub_templates.users')

@section('sub_content')
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
                    <img src="{{asset('icons/trash-fill.svg')}}" alt="Bootstrap" width="15" height="15"></img>
                </a>
                <a href="/users/edit/{{ $user->id }}" class="anchor_edit detail_anchor">
                    <img src="{{asset('icons/pencil-square.svg')}}" alt="Bootstrap" width="15" height="15"></img>
                </a>
            </div>
        @endforeach
        @foreach($users_2 as $user_2)
            <div class="col-md-3 col-sm-3 col-xs-4 date">
                {{ $user_2->created_at->format('d M Y') }}
            </div>
            <div class="col-md-9 col-sm-9 col-xs-8 name">
                @if(Auth::user()->id == $user_2->id)
                    <b>
                        <a href="/users/detail/{{$user_2->id}}" id="current_user_detail_anchor" class="detail_anchor" id="myBtn">
                            @php $words_limit = $words_count::words_limit($user_2->email); echo $words_limit; @endphp
                        </a>
                    </b>
                @else
                    <a href="/users/detail/{{$user_2->id}}" class="detail_anchor" id="myBtn">
						@php $words_limit = $words_count::words_limit($user_2->email); echo $words_limit; @endphp
                    </a>
                @endif
                <a href="/users/delete/{{ $user_2->id }}" class="anchor_check_out_2 delete_user">
                    <img src="{{asset('icons/trash-fill.svg')}}" alt="Bootstrap" width="15" height="15"></img>
                </a>
                <a href="/users/edit/{{ $user_2->id }}" class="anchor_edit detail_anchor">
                    <img src="{{asset('icons/pencil-square.svg')}}" alt="Bootstrap" width="15" height="15"></img>
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
						<p class="name_mobile"> @php $words_limit = $words_count::words_limit($user->name); echo $words_limit; @endphp</p>
					</a>
				@else
					<a href="/users/detail/{{$user->id}}" class="detail_anchor" id="myBtn">
						<p class="name_mobile"> @php $words_limit = $words_count::words_limit($user->name); echo $words_limit; @endphp</p>
					</a>
				@endif
				<br>
				<a href="/users/delete/{{ $user->id }}" class="delete_user delete_user_button">
					<img src="{{asset('icons/trash-fill.svg')}}" alt="Bootstrap" width="20" height="20"></img>
				</a>
				<a href="/users/edit/{{ $user->id }}" class="detail_anchor edit_user_button">
					<img src="{{asset('icons/pencil-square.svg')}}" alt="Bootstrap" width="20" height="20"></img>
				</a>
			</div>
        @endforeach
        <br>
        @foreach($users_2 as $user_2)
			<div class="reception_user_list_mobile_detail">
				<h5 class="date_format_mobile">{{ $user_2->created_at->format('d.n.Y') }}</h5>
				@if(Auth::user()->id == $user_2->id)
					<a href="/users/detail/{{$user_2->id}}" id="current_user_detail_anchor" class="detail_anchor" id="myBtn">
						<p class="name_mobile">
							@php $words_limit = $words_count::words_limit($user_2->email); echo $words_limit; @endphp
						</p>
					</a>
				@else
					<a href="/users/detail/{{$user_2->id}}" class="detail_anchor" id="myBtn">
						<p class="name_mobile">
							@php $words_limit = $words_count::words_limit($user_2->email); echo $words_limit; @endphp
						</p>
					</a>
				@endif
				<br>
				<a href="/users/delete/{{ $user->id }}" class="delete_user delete_user_button">
                    <img src="{{asset('icons/trash-fill.svg')}}" alt="Bootstrap" width="20" height="20"></img>
				</a>
				<a href="/users/edit/{{ $user->id }}" class="detail_anchor edit_user_button">
                    <img src="{{asset('icons/pencil-square.svg')}}" alt="Bootstrap" width="20" height="20"></img>
				</a>
			</div>
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
@endsection
