@extends('Templates.sub_templates.guests')

@section('sub_content')
	<!-- each respective category title name -->
    <div class="col-md-12">
		<div class="col-md-3 col-sm-3 detail_info_header">
		  <h4>Guest Detail</h4>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3 detail_info_header_mobile">
		  <h4>Detail</h4>
		</div>
    </div>
	<!-- tablet,desktop and larger screens view -->
    <div class="guest_input_data">
        <div class="col-md-12 col-sm-12 col-xs-12" id="guest_input_data">
            <div class="col-md-4 col-sm-4 col-xs-4">
                Date
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8">
                : {{ $guests->created_at->format('d M Y') }}
            </div>
        </div>
    </div>
    <div class="guest_input_data">
        <div class="col-md-12 col-sm-12 col-xs-12" id="guest_input_data">
            <div class="col-md-4 col-sm-4 col-xs-4">
                Name
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8 word_break">
               : {{ $guests->name }}
            </div>
        </div>
    </div>
    <div class="guest_input_data">
        <div class="col-md-12 col-sm-12 col-xs-12" id="guest_input_data">
            <div class="col-md-4 col-sm-4 col-xs-4">
                NRC
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8 word_break">
                : {{ $guests->nrc }}
            </div>
        </div>
    </div>
    <div class="guest_input_data">
        <div class="col-md-12 col-sm-12 col-xs-12" id="guest_input_data">
            <div class="col-md-4 col-sm-4 col-xs-4">
                Email
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8 word_break">
                : {{ $guests->email }}
            </div>
        </div>
    </div>
    <div class="guest_input_data">
        <div class="col-md-12 col-sm-12 col-xs-12" id="guest_input_data">
            <div class="col-md-4 col-sm-4 col-xs-4">
                Phone
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8 word_break">
                : {{ $guests->phone }}
            </div>
        </div>
    </div>
    <div class="guest_input_data">
        <div class="col-md-12 col-sm-12 col-xs-12" id="guest_input_data">
            <div class="col-md-4 col-sm-4 col-xs-4">
                Adult
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8 word_break">
                : {{ $guests->adult }}
            </div>
        </div>
    </div>
    <div class="guest_input_data">
        <div class="col-md-12 col-sm-12 col-xs-12" id="guest_input_data">
            <div class="col-md-4 col-sm-4 col-xs-4">
                child
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8 word_break">
                : {{ $guests->child }}
            </div>
        </div>
    </div>
    <div class="guest_input_data">
        <div class="col-md-12 col-sm-12 col-xs-12" id="guest_input_data">
            <div class="col-md-4 col-sm-4 col-xs-4">
                Address
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8 word_break">
                : {{ $guests->address }}
            </div>
        </div>
    </div>
    <div class="guest_input_data">
        <div class="col-md-12 col-sm-12 col-xs-12" id="guest_input_data">
            <div class="col-md-4 col-sm-4 col-xs-4">
                Room
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8 word_break">
                : {{ $guests->rooms->name }}
            </div>
        </div>
    </div>
	<!-- normal mobile view,mobile landscape view,tablet view -->
    <div class="guest_input_data_mobile_show">
		<h4 class="mobile_title">Detail</h4>
		<div class="border_top_2"><div>
		<h5 class="guest_input_data_header"><b>Date</b></h5>
		<p class="word_break">{{ $guests->created_at->format('d.n.Y') }}</p>
		<h5 class="guest_input_data_header"><b>User Name</b></h5>
		<p class="word_break">{{ $guests->name }}</p>
		<h5 class="guest_input_data_header"><b>User Email</b></h5>
		<p class="word_break">{{ $guests->email }}</p>
		<h5 class="guest_input_data_header"><b>Phone</b></h5>
		<p class="word_break">{{ $guests->phone }}</p>
		<h5 class="guest_input_data_header"><b>Adult</b></h5>
		<p class="word_break">{{ $guests->adult }}</p>
		<h5 class="guest_input_data_header"><b>Child</b></h5>
		<p class="word_break">{{ $guests->child }}</p>
		<h5 class="guest_input_data_header"><b>Address</b></h5>
		<p class="word_break">{{ $guests->address }}</p>
		<h5 class="guest_input_data_header"><b>Room</b></h5>
		<p class="word_break">{{ $guests->rooms->name }}</p>
    </div>
@endsection
