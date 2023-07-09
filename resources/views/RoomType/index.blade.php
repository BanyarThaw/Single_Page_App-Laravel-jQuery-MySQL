@extends('Templates.sub_templates.roomtypes')

@section('sub_content')
	<!-- each respective category title name -->
    <div class="col-md-12">
		<div class="col-md-3 room_detail_info_header">
			<h4>RoomType</h4>
		</div>
		<div class="room_detail_info_header_mobile">
			<h4>List</h4>
		</div>
		<h4 class="mobile_title_room">List</h4>
    </div>
    <!-- words limit checking -->
    @php
       $words_count = "\App\Http\Controllers\WordsLimitController";
    @endphp
	<!-- tablet,desktop and larger screens view -->
    <div class="col-md-12 roomtype_list">
        <div class="col-md-3 col-sm-3 col-xs-4 date">
            Date
        </div>
        <div class="col-md-9 col-sm-9 col-xs-8 name">
            Name
        </div>
        @foreach($room_types as $room_type)
            <div class="col-md-3 col-sm-3 col-xs-4 date">
                {{ $room_type->created_at->format('j.n.Y') }}
            </div>
            <div class="col-md-9 col-sm-9 col-xs-8 name">
                @php $words_limit = $words_count::words_limit($room_type->name); echo $words_limit; @endphp
                <a href="/roomtypes/edit/{{ $room_type->id }}" class="room_anchor_check_out detail_anchor" id="myBtn">
                    <img src="{{asset('icon/pencil-square.png')}}" alt="Bootstrap" width="20" height="20"></img>
                </a>
            </div>
        @endforeach
    </div>
	<!-- normal mobile view,mobile landscape view,tablet view -->
    <div class="col-xs-12 user_list_mobile">
        <div class="border_top"></div>
        @foreach($room_types as $room_type)
            <div class="reception_user_list_mobile_detail">
                <h5 class="date_format_mobile">{{ $room_type->created_at->format('d.n.Y') }}</h5>
                <p class="name_mobile"> @php $words_limit = $words_count::words_limit($room_type->name); echo $words_limit; @endphp</p>                    
                <br>
                <a href="/roomtypes/edit/{{ $room_type->id }}" class="detail_anchor edit_room_button">
                    <img src="{{asset('icon/pencil-square.png')}}" alt="Bootstrap" width="20" height="20"></img>
                </a>
            </div>
            <br>
        @endforeach
    </div>
@endsection
