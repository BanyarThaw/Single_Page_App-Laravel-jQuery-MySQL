<!-- each respective category title name -->
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="col-md-3 col-sm-3 col-xs-3 detail_info_header">
        <h4>User List</h4>
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
<!-- tablet,desktop and larger screens view -->
<div class="col-md-12 col-sm-12 col-xs-12 user_list_table_desktop">
    <div class="col-md-3 col-sm-3 col-xs-4 date">
        Date
    </div>
    <div class="col-md-9 col-sm-9 col-xs-8 name">
        Name
    </div>
    @foreach($users as $user)
        <div class="col-md-3 col-sm-3 col-xs-4 date">
            {{ $user->created_at->format('j.n.Y') }}
        </div>
        <div class="col-md-9 col-sm-9 col-xs-8 name">
            @if(Auth::user()->id == $user->id)
                <b>
                    <a href="{{ route('users.show',$user->id) }}" id="current_user_detail_anchor" class="detail_anchor" id="myBtn">
                        @php $words_limit = $words_count::words_limit($user->name); echo $words_limit; @endphp
                    </a>
                </b>
            @else
                <a href="{{ route('users.show',$user->id) }}" class="detail_anchor" id="myBtn">
                    @php $words_limit = $words_count::words_limit($user->name); echo $words_limit; @endphp
                </a>
            @endif
            <a href="{{ route('users.delete',$user->id) }}" class="anchor_check_out_2 delete_user">
                <img src="{{asset('icon/trash-fill.png')}}" alt="Bootstrap" width="15" height="15"></img>
            </a>
            <a href="{{ route('users.edit',$user->id) }}" class="anchor_edit detail_anchor">
                <img src="{{asset('icon/pencil-square.png')}}" alt="Bootstrap" width="15" height="15"></img>
            </a>
        </div>
    @endforeach
</div>
<!-- normal mobile view,mobile landscape view,tablet view -->
<div class="col-xs-12 user_list_mobile">
    <div class="border_top"></div>
    @foreach($users as $user)
        <div class="reception_user_list_mobile_detail">
            <h5 class="date_format_mobile">{{ $user->created_at->format('d.n.Y') }}</h5>
            @if(Auth::user()->id == $user->id)
                <a href="{{ route('users.show',$user->id) }}" id="current_user_detail_anchor" class="detail_anchor" id="myBtn">
                    <p class="name_mobile">@php $words_limit = $words_count::words_limit($user->name); echo $words_limit; @endphp</p>
                </a>
            @else
                <a href="{{ route('users.show',$user->id) }}" class="detail_anchor" id="myBtn">
                    <p class="name_mobile">@php $words_limit = $words_count::words_limit($user->name); echo $words_limit; @endphp</p>
                </a>
            @endif
            <br>
            <a href="{{ route('users.delete',$user->id) }}" class="delete_user delete_user_button">
                <img src="{{asset('icon/trash-fill.png')}}" alt="Bootstrap" width="20" height="20"></img>
            </a>
            <a href="{{ route('users.edit',$user->id) }}" class="detail_anchor edit_user_button">
                <img src="{{asset('icon/pencil-square.png')}}" alt="Bootstrap" width="20" height="20"></img>
            </a>
        </div>
        <br>
    @endforeach
</div>
<!-- search form -->
<div class="user_search_form">
    <form action="/users/search" method="post" autocomplete="off">
        {{ csrf_field() }}
        <input type="text" name="search" placeholder="Search Name" class="ajax_user_list" id="Search" autocomplete="false">
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
