@component('partials.reception.header_and_menu')

    @section('reception-check-in-underline')
        sub_menus_active
    @endsection

    @section('reception-check-in')
        sub_menu_anchor_active
    @endsection

    @slot('content')
        @include('partials.reception.guest_create')
    @endslot
@endcomponent

