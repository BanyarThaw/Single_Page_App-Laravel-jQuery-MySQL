<h3><b>Guest Detail</b></h3>
<p> Date : <b>{{ $guest->created_at->format('d M Y') }}</b> </p>
<p class="word_break"> Name : <b>{{ $guest->name }}</b> </p>
<p class="word_break"> NRC : <b>{{ $guest->nrc }}</b> </p>
<p class="word_break"> Email : <b>{{ $guest->email }}</b> </p>
<p class="word_break"> Phone : <b>{{ $guest->phone }}</b> </p>
<p class="word_break"> Adult : <b>{{ $guest->adult }}</b> </p>
<p class="word_break"> Child : <b>{{ $guest->child }}</b> </p>
<p class="word_break"> Address : <b>{{ $guest->address }}</b> </p>
<p class="word_break"> Room : <b>{{ $guest->rooms->room_name }}</b> </p>
