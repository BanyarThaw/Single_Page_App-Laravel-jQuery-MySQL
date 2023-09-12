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
<!-- words limit checking -->
@php
   $words_count = "\App\Http\Controllers\WordsLimitController";
@endphp
<div class="guest_foreach">
	<!-- tablet,desktop and larger screens view -->
    <div class="col-md-12 col-sm-12 col-xs-12 guest_list">
        <div class="col-md-3 col-sm-3 col-xs-5 date">
            Date
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 name">
            Name
        </div>
        @foreach($guests as $guest)
            <div class="col-md-3 col-sm-3 col-xs-5 date">
                {{ $guest->created_at->format('j.n.Y') }}
            </div>
            <div class="col-md-9 col-sm-9 col-xs-7 name">
                <a href="/guests/{{ $guest->id }}" class="detail_anchor" id="myBtn">
                    @php $words_limit = $words_count::words_limit($guest->name); echo $words_limit; @endphp
                </a>
            </div>
        @endforeach
		<!-- pagination -->
        <div class="p-link" id="guest_list">
            <div class="StartAjaxPagination">
                {{$guests->onEachSide(0)->links()}}
            </div>
        </div>
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
            </div>
            <br>
        @endforeach
		<!-- pagination -->
        <div class="col-md-12 col-xs-12 p-link_for_guest" id="p-link">
            <div class="p-link" id="guest_list">
                <div class="StartAjaxPagination">
                    @if ($guests->hasPages())
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($guests->onFirstPage())
                                <li class="disabled"><span>{{ __('Prev') }}</span></li>
                            @else
                                <li><a href="{{ $guests->previousPageUrl() }}" rel="prev">{{ __('Prev') }}</a></li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($guests->hasMorePages())
                                <li><a href="{{ $guests->nextPageUrl() }}" rel="next">{{ __('Next') }}</a></li>
                            @else
                                <li class="disabled"><span>{{ __('Next') }}</span></li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- search form -->
<div class="guest_search_form">
    <form action="/guests/search" method="post" autocomplete="off">
        {{ csrf_field() }}
        <input type="text" name="search" placeholder="Search Name" class="ajax_guest_list" id="Search" autocomplete="false">
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