<!-- loader -->
@include('partials.components.circle')
<!-- login form (larger screens) -->
<div class="login_form_wrap">
    <div class="login_form">
        <div class="header_login">
            <img src="{{asset('icon/globe.png')}}" alt="Bootstrap" width="64" height="64"></img>
            <h3>Web Application</h3>
        </div>
        <div class="main_login">
            {{-- class="login_submit_form"--}}
            <form action="/users/login" method="post" class="login_submit_form">
                {{ csrf_field() }}
                <label>E-mail</label>
                <br>
                <input type="text" name="email" required="email" id="login_email" class="login_email email">
                <br><br>
                <label>Password</label>
                <br>
                <input type="password" name="password" required class="login_password password">
                <br><br><br>
                <input type="submit" value="Login" class="login_submit login_button">
            </form>
        </div>
    </div>
</div>
<!-- login form (mobile view) -->
<div class="login_form_for_small_screens">
    <div class="header_login_small_screens">
        <img src="{{asset('icon/globe.png')}}" alt="Bootstrap" width="45" height="45"></img>
        <h4>Web Application</h4>
    </div>
    <div class="main_login_small_screens">
        {{-- class="login_submit_form_small_screens"--}}
        <form action="/users/login" method="post" class="login_submit_form_small_screens">
            {{ csrf_field() }}
            <label>E-mail</label>
            <br>
            <input type="text" name="email" class="email" id="login_email">
            <br><br>
            <label>Password</label>
            <br>
            <input type="password" name="password" required class="login_password_small_screens password">
            <br><br>
            <input type="submit" value="Login" class="login_submit_small_screens login_button">
        </form>
    </div>
</div>
