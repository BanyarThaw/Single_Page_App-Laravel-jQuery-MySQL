@extends('Templates.sub_templates.rooms')

@section('rooms')
    alive
@endsection

@section('sub_content')
	<!-- each respective category title name -->
    <div class="col-md-12">
        <div class="col-md-3 room_detail_info_header">
            <h4>RoomType Edit</h4>
        </div>
        <div class="col-md-3 col-sm-3 room_detail_info_header_mobile">
            <h4>Edit</h4>
        </div>
        <div class="user_header_for_small_screens">
            <h4 class="user_header_for_small_screens_create">Edit</h4>
        </div>
    </div>
    <br>
	<!-- both desktop view and mobile view -->
    <form action="/roomtypes/edit/{{ $room_types->id }}" method="post" enctype="multipart/form-data" class="user_form">
        {{ csrf_field() }}
        <div class="room_input_data_form col-md-12 col-sm-12 col-xs-12">
            <div class="room_input_data">
                <div class="col-md-12" id="user_input_form">
                    <div class="col-md-4 room_name">
                        Name :
                    </div>
                    <div class="room_name_mobile">
                        Name
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="room_type_name" value="{{ $room_types->name }}" required>
                    </div>
                </div>
            </div>
			<!-- button for desktop and larger screens -->
            <div class="col-lg-12" id="room_submit_button">
                <div class="room_submit_button">
                    <button type="submit" class="edit_roomtype">Update</button>
                </div>
            </div>
			<!-- button for mobile screens -->
            <div class="col-md-12 col-sm-12 col-xs-12" id="room_submit_button_mobile">
                <div>
                    <button type="submit" class="edit_roomtype">Update</button>
                </div>
            </div>
        </div>
    </form>
@endsection
