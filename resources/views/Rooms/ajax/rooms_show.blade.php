<h3><b>Room Detail</b></h3>
<p class="word_break"> Date : <b>{{ $room->created_at->format('d M Y') }}</b> </p>
<p class="word_break"> Name : <b>{{ $room->name }}</b> </p>
<p class="word_break"> Type : <b>{{ $room->room_types->name }}</b> </p>