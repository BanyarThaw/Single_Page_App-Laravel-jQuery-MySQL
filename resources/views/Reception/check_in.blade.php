@extends('Templates.sub_templates.reception')

@section('sub_content')
	<!-- each respective category title name -->
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-3 col-sm-3 col-xs-3 reception_detail_info_header">
            <h4>Check-in List</h4>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3 reception_detail_info_header_mobile">
            <h4>List</h4>
        </div>
        <h4 class="mobile_title">List</h4>
    </div>
    @include('Reception.check_in_guest_foreach')
	<!-- search form -->
    <div class="reception_search_form">
        <form action="/reception/check_in/search" method="post" autocomplete="off">
            {{ csrf_field() }}
            <input type="text" name="search" placeholder="Search Name" class="ajax_check_in_list" id="Search" autocomplete="false">
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
