@component('partials.reception.header_and_menu')

    @section('reception-check-in-list-underline')
        sub_menus_active
    @endsection

    @section('reception-check-in-list')
        sub_menu_anchor_active
    @endsection

    @slot('content')
        @include('partials.reception.guest_create')
    @endslot
@endcomponent

