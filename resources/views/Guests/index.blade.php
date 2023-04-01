@extends('Templates.sub_templates.guests')

@section('sub_content')
	<!-- each respective category title name -->
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-3 col-sm-3 detail_info_header">
            <h4>Guest List</h4>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3 detail_info_header_mobile">
            <h4>List</h4>
        </div>
        <h4 class="mobile_title">List</h4>
    </div>
    @include('Guests.guest_foreach')
	<!-- search form -->
    <div class="guest_search_form">
        <form action="/guests/search" method="post" autocomplete="off">
            {{ csrf_field() }}
            <input type="text" name="search" placeholder="Search Name" class="ajax_guest_list" id="Search" autocomplete="false">
        </form>
        <div>
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
@endsection
