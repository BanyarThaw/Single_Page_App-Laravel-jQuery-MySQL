@component('partials.users.header_and_menu')
    @section('user_list_active')
        sub_menu_anchor_active
    @endsection

    @section('user_list_active_menu')
        sub_menus_active
    @endsection
    @slot('content')
        @include('partials.users.list')
    @endslot
@endcomponent
