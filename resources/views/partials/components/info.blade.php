<div class="header col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h3>Web Application</h3>
    <div class="wrap_logout">
        <!-- user info and logout button -->
        <div class="logout">
            <div class="show">
                <a href="{{ route('users.show',Auth::user()->id) }}" class="detail_anchor" id="myBtn">
                    <img src="{{asset('icon/person-circle.png')}}" alt="Bootstrap" width="32" height="32"></img>
                </a>
            </div>
            &nbsp;&nbsp;
            <a href="{{ route('logout') }}" title="logout" class="logout_button">
                <img src="{{asset('icon/power.png')}}" alt="Bootstrap" width="32" height="32"></img>
            </a>
        </div>
    </div>
</div>
