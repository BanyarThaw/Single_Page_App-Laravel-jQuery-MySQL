@extends('Templates.sub_templates.rooms')

@section('sub_content')
	<!-- each respective category title name -->
    <div class="col-md-12">
        <div class="col-md-3 room_detail_info_header">
            <h4>Room List</h4>
        </div>
        <div class="col-md-3 col-sm-3  room_detail_info_header_mobile">
            <h4>List</h4>
        </div>
        <h4 class="mobile_title_room">List</h4>
    </div>
    <!-- words limit checking -->
    @php
       $words_count = "\App\Http\Controllers\WordsLimitController";
    @endphp
	<!-- tablet,desktop and larger screens view -->
    <div class="col-md-12 col-sm-12 col-xs-12 room_list">
        <div class="col-md-3 col-sm-3 col-xs-4 date">
            Date
        </div>
        <div class="col-md-9 col-sm-9 col-xs-8 name">
            Name
        </div>
        @foreach($rooms as $room)
            <div class="col-md-3 col-sm-3 col-xs-4 date">
                {{ $room->created_at->format('j.n.Y') }}
            </div>
            <div class="col-md-9 col-sm-9 col-xs-8 name">
                <a href="/rooms/detail/{{ $room->id }}" class="room_anchor detail_anchor" id="myBtn">
                    @php $words_limit = $words_count::words_limit($room->name); echo $words_limit; @endphp
                </a>
                <a href="/rooms/edit/{{ $room->id }}" class="detail_anchor edit_room_button">
                    <img src="{{asset('icons/pencil-square.svg')}}" alt="Bootstrap" width="20" height="20"></img>
                </a>
            </div>
        @endforeach
    </div>
	<!-- normal mobile view,mobile landscape view,tablet view -->
    <div class="col-xs-12 user_list_mobile">
        <div class="border_top"></div>
        @foreach($rooms as $room)
			<div class="reception_user_list_mobile_detail">
				<h5 class="date_format_mobile">{{ $room->created_at->format('d.n.Y') }}</h5>
				<a href="/rooms/detail/{{ $room->id }}" class="detail_anchor" id="myBtn">
					<p class="name_mobile">
						@php $words_limit = $words_count::words_limit($room->name); echo $words_limit; @endphp
					</p>
				</a>
				<br>
				<a href="/rooms/edit/{{ $room->id }}" class="detail_anchor edit_room_button">
					<img src="{{asset('icons/pencil-square.svg')}}" alt="Bootstrap" width="20" height="20"></img>
				</a>
			</div>
			<br>
        @endforeach
    </div>
@endsection
