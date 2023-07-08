<!-- words limit checking -->
@php
	$words_count = "\App\Http\Controllers\WordsLimitController";
@endphp
<div class="guest_foreach">
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
                <a href="/reception/make_check_out/{{ $guest->id }}?page_number={{$guests->currentPage()}}" class="anchor_check_out">Check-out</a>
            </div>
        @endforeach
		<!-- pagination --> 
        <div class="p-link" id="reception_check_in">
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
                    <p class="name_mobile">@php $words_limit_mobile = $words_count::words_limit($guest->name); echo $words_limit_mobile; @endphp</p>
                </a>
                <br>
                <a href="/reception/make_check_out/{{ $guest->id }}?page_number={{$guests->currentPage()}}" class="anchor_check_out"><img src="{{asset('icons/check-square.png')}}" alt="Bootstrap" width="20" height="20"></img></a>
            </div>
            <br>
        @endforeach
        <!-- pagination link -->
        <div class="col-md-12" id="p-link">
            <div class="p-link" id="reception_check_in">
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