@extends('Templates.sub_templates.users')

@section('users')
    alive
@endsection

@section('sub_content')
	<!-- each respective category title name -->
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-3 col-sm-3 detail_info_header">
            <h4>Edit User</h4>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3 detail_info_header_mobile">
            <h4>Edit</h4>
        </div>
        <div class="user_header_for_small_screens">
            <h4 class="user_header_for_small_screens_edit">Edit</h4>
        </div>
    </div>
    <br>
	<!-- both desktop view and mobile view -->
    <form action="{{ route('users.update',$users->id) }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-12 col-sm-12" id="user_user_input_data_form">
            <div class="user_input_data">
                <div class="col-md-12 col-sm-12" id="user_input_data_detail">
                    <div class="col-md-3 col-sm-12">
                        User Name :
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="name" value="{{ $users->name }}" id="user_user_input_data_detail_2" required>
                    </div>
                </div>
            </div>
            <div class="user_input_data">
                <div class="col-md-12 col-sm-12" id="user_input_data_detail">
                    <div class="col-md-3 col-sm-12">
                        Email :
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" name="email" value="{{ $users->email }}" id="user_user_input_data_detail_2" required>
                    </div>
                </div>
            </div>
            <div class="user_input_data">
                <div class="col-md-12 col-sm-12" id="user_input_data_detail">
                    <div class="col-md-3 col-sm-12">
                        Password :
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <input type="password" name="password" id="user_user_input_data_detail_2">
                    </div>
                </div>
            </div>
			<!-- button for desktop and larger screens -->
            <div class="col-md-12 col-sm-12" id="user_user_submit_button">
                <div class="user_user_submit_button">
                    <button type="submit">Update</button>
                </div>
            </div>
			<!-- button for mobile screens -->
            <div class="col-md-12 col-sm-12 col-xs-12" id="user_user_submit_button_mobile">
                <div>
                    <button type="submit">Update</button>
                </div>
            </div>
        </div>
    </form>
@endsection
