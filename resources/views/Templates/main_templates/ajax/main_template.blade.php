@include('partials.components.loader')
<div class="wrap">
    <div class="wrap_menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @include('partials.components.info')
        <div class="menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('partials.components.menu')
            <div class="main_body col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @include('partials.components.msg')
                @include('Reception.ajax.reception')
            </div>
        </div>
    </div>
</div>