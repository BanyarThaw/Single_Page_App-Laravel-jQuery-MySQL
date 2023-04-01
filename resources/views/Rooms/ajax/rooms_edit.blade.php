<h3><b>Edit Room</b></h3>
<form action="/rooms/edit/{{ $room->id }}" method="post">
    {{ csrf_field() }}
    <label>Room Name :</label>
    <br>
    <input type="text" name="room_name" value="{{ $room->name }}" id="popup_input" required>
    <br><br>
    <label>Room Number :</label>
    <br>
    <input type="text" name="room_number" value="{{ $room->room_number }}" id="popup_input" required>
    <br><br>
    <label>Room Type :</label>
    <br>
    <select name="room_type" id="popup_input_rooms" >
        @foreach($room_types as $room_type)
            <option value="{{ $room_type->id }}" {{$room->room_types->id == $room_type->id ? "selected" : ""}}>{{ $room_type->name }}</option>
        @endforeach
    </select>
    <br><br>
    <input type="submit" value="Update" class="edit_room">
</form>