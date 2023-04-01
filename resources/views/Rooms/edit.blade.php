@extends('Templates.sub_templates.rooms')

@section('sub_content')
	<!-- each respective category title name -->
    <div class="col-md-12">
        <div class="col-md-3 room_detail_info_header">
            <h4>Edit Room</h4>
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
    <form action="/rooms/edit/{{ $rooms->id }}" method="post" enctype="multipart/form-data" class="user_form">
      {{ csrf_field() }}
      <div class="room_input_data_form col-md-12 col-sm-12 col-xs-12">
        <div class="room_input_data">
            <div class="col-md-12" id="user_input_form">
                <div class="col-md-4 room_name">
                    Room Name :
                </div>
                <div class="room_name_mobile">
                  Name
                </div>
                <div class="col-md-8">
                    <input type="text" name="room_name" value="{{ $rooms->name }}" required>
                </div>
            </div>
        </div>
        <div class="room_input_data">
            <div class="col-md-12" id="user_input_form">
                <div class="col-md-4 room_number">
                    Room Number :
                </div>
                <div class="room_number_mobile">
                  Number
                </div>
                <div class="col-md-8">
                    <input type="number" name="room_number" placeholder="number only" value="{{$rooms->room_number}}" required>
                </div>
            </div>
        </div>
        <div class="room_input_data">
            <div class="col-md-12" id="user_input_form">
                <div class="col-md-4 room_type_name">
                    Room Type :
                </div>
                <div class="room_type_mobile">
                  Type
                </div>
                <div class="col-md-8">
                    <select name="room_type" id="room_type">
                        @foreach($room_types as $room_type)
                            <option value="{{ $room_type->id }}" {{$rooms->room_types->id == $room_type->id ? "selected" : ""}}>{{ $room_type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
		<!-- button for desktop and larger screens -->
        <div class="col-lg-12" id="room_submit_button">
            <div class="room_submit_button">
                <button type="submit" class="edit_room">Update</button>
            </div>
        </div>
		<!-- button for mobile screens -->
        <div class="col-md-12 col-sm-12 col-xs-12" id="room_submit_button_mobile">
            <div>
                <button type="submit" class="edit_room">Update</button>
            </div>
        </div>
      </div>
    </form>
@endsection
