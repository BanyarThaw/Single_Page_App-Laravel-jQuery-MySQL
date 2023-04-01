<h3><b>Edit Room Type</b></h3>
<form action="/roomtypes/edit/{{ $room_type->id }}" method="post">
    {{ csrf_field() }}
    <label>RoomType Name :</label>
    <br>
    <input type="text" name="room_type_name" value="{{ $room_type->name }}" id="popup_input" required>
    <br><br>
    <input type="submit" value="Update" class="edit_roomtype">
</form>