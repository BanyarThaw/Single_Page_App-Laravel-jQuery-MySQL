@component('partials.rooms.header_and_menu')

    @section('room_list_active')
        sub_menu_anchor_active
    @endsection

    @section('room_list_active_menu')
        sub_menus_active
    @endsection
    @slot('content')
        @include('partials.rooms.room_list')
    @endslot
@endcomponent
