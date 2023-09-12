@extends('Templates.sub_templates.rooms')

@section('rooms')
    alive
@endsection

@section('sub_content')
    <div class="col-md-12">
		<!-- each respective category title name -->
		<div class="col-md-3 room_detail_info_header">
			<h4>Room Detail</h4>
		</div>
		<div class="col-md-3 col-sm-3  room_detail_info_header_mobile">
			<h4>Detail</h4>
		</div>
		<div class="user_header_for_small_screens">
			<h4 class="user_header_for_small_screens_create">Detail</h4>
		</div>
		<!-- edit button -->
		<div class="room_edit">
			<a href="/rooms/edit/{{ $rooms->id }}" class="edit_form detail_anchor" id="myBtn">
				<button>
					<img src="{{asset('icon/pencil-square.png')}}" alt="Bootstrap" width="20" height="20"></img>
				</button>
			</a>
		</div>
    </div>
    <br>
	<!-- tablet,desktop and larger screens view -->
    <div class="room_info_detail">
        <div>
            <div class="col-md-12 col-sm-12 col-xs-12" id="user_input_form">
                <div class="col-md-4 col-sm-4">
                    Room Name
                </div>
                <div class="col-md-8 col-sm-8 word_break">
                    : {{ $rooms->room_name }}
                </div>
            </div>
        </div>
        <div>
            <div class="col-md-12 col-sm-12 col-xs-12" id="user_input_form">
                <div class="col-md-4 col-sm-4">
                    Room Number
                </div>
                <div class="col-md-8 col-sm-4 word_break">
                    : {{ $rooms->room_number }}
                </div>
            </div>
        </div>
        <div>
            <div class="col-md-12 col-sm-12 col-xs-12" id="user_input_form">
                <div class="col-md-4 col-sm-4">
                    Room Type
                </div>
                <div class="col-md-8 col-sm-8 word_break">
                    : {{ $rooms->room_types->name }}
                </div>
            </div>
        </div>
    </div>
	<!-- normal mobile view,mobile landscape view,tablet view -->
    <div class="room_info_detail_mobile">
		<br><br>
		<h5 class="guest_input_data_header"><b>Room Name</b></h5>
		<p class="word_break">{{ $rooms->room_name }}</p>
		<h5 class="guest_input_data_header"><b>Number</b></h5>
		<p class="word_break">{{ $rooms->room_number }}</p>
		<h5 class="guest_input_data_header"><b>Room Type</b></h5>
		<p class="word_break">{{ $rooms->room_types->name }}</p>
    </div>
@endsection
