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
    <!-- words limit checking -->
    @php
        $words_count = "\App\Http\Controllers\WordsLimitController";
    @endphp
    <!-- tablet,desktop and larger screens view -->
    <div class="col-md-12 col-sm-12 col-xs-12 guest_list_tablet_desktop">
        <div class="col-md-3 col-sm-3 col-xs-4 date">
            Date
        </div>
        <div class="col-md-9 col-sm-9 col-xs-8 name">
            Name
        </div>
        @foreach($guests as $guest)
            <div class="col-md-3 col-sm-3 col-xs-4 date">
                {{ $guest->created_at->format('j.n.Y') }}
            </div>
            <div class="col-md-9 col-sm-9 col-xs-8 name">
                <a href="/guests/{{ $guest->id }}" class="detail_anchor" id="myBtn">
                    @php $words_limit = $words_count::words_limit($guest->name); echo $words_limit; @endphp
                </a>
                <a href="/reception/make_check_out/{{ $guest->id }}" class="anchor_check_out">Check-out</a>
            </div> 
        @endforeach
    </div>
    <!-- normal mobile view,mobile landscape view,tablet view -->
    <div class="col-xs-12 user_list_mobile">
        <div class="border_top"></div>
        @foreach($guests as $guest)
            <div class="reception_user_list_mobile_detail">
              <h5 class="date_format_mobile">{{ $guest->created_at->format('d.n.Y') }}</h5>
                <a href="/guests/{{$guest->id}}" class="detail_anchor" id="myBtn">
                    <p class="name_mobile">@php $words_limit = $words_count::words_limit($guest->name); echo $words_limit; @endphp</p>
                </a>
                <br>
                <a href="/reception/make_check_out/{{ $guest->id }}" class="anchor_check_out"><img src="{{asset('icon/check-square.png')}}" alt="Bootstrap" width="20" height="20"></img></a>
            </div>
          <br>
        @endforeach
    </div>
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
