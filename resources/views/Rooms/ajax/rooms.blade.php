@component('partials.rooms.header_and_menu')
    @slot('content')
        @include('partials.rooms.room_list')
    @endslot
@endcomponent
        