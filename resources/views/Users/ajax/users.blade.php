@component('partials.users.header_and_menu')
    @slot('content')
        @include('partials.users.list')
    @endslot
@endcomponent
        