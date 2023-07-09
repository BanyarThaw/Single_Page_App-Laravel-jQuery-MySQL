@extends('Templates.sub_templates.users')

@section('sub_content')
    <div class="col-md-12 col-sm-12 col-xs-12">
		<!-- each respective category title name -->
        <div class="col-md-3 col-sm-3 col-xs-3 detail_info_header">
            <h4>Detail Info</h4>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3 detail_info_header_mobile">
            <h4>Detail</h4>
        </div>
        <div class="user_header_for_small_screens">
			<h4 class="user_header_for_small_screens_create">Detail</h4>
        </div>
		<!-- edit button -->
        <div class="room_edit">
            <a href="/users/edit/{{ $users->id }}" class="edit_form detail_anchor" id="myBtn">
                <button><img src="{{asset('icon/pencil-square.png')}}" alt="Bootstrap" width="20" height="20"></img></button>
            </a>
        </div>
    </div>
    <br><br>
	<!-- tablet,desktop and larger screens view -->
    <div class="user_input_data_show">
        <div class="col-md-12 col-sm-12 col-xs-12" id="user_name_password">
            <div class="col-md-4 col-sm-4 col-xs-3">
                User Name
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8 word_break">
                : {{ $users->name }}
            </div>
        </div>
    </div>
    <div class="user_input_data_show">
        <div class="col-md-12 col-sm-12 col-xs-12" id="user_name_password">
            <div class="col-md-4 col-sm-4 col-xs-3 word_break">
                Email
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8">
                : {{ $users->email }}
            </div>
        </div>
    </div>
	<!-- normal mobile view,mobile landscape view,tablet view -->
    <div class="user_input_data_mobile">
		<br>
		<h5 class="guest_input_data_header"><b>User Name</b></h5>
		<p class="word_break">{{ $users->name }}</p>
		<h5 class="guest_input_data_header"><b>User Email</b></h5>
		<p class="word_break">{{ $users->email }}</p>
    </div>
@endsection
