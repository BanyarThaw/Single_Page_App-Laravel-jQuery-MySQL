<!-- Error Information (tell what's happened) -->
@if(count($errors))
    @foreach($errors->all() as $error)
        <h3>{{ $error }}</h3>
    @endforeach
@endif
<!-- Information (tell what's happened) -->
@if(session('info'))
    <h3>{{ session('info') }}</h3>
@endif