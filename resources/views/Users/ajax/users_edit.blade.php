<h3><b>Edit User</b></h3>
<form action="/users/edit/{{ $user->id }}" method="post">
    {{ csrf_field() }}
    <label>Name :</label>
    <br>
    <input type="text" name="name" value="{{ $user->name }}" id="popup_input" required>
    <br><br>
    <label>Email :</label>
    <br>
    <input type="text" name="email" value="{{ $user->email }}" id="popup_input" required>
    <br><br>
    <label>New Password :</label>
    <br>
    <input type="password" name="password">
    <br><br>
    <input type="submit" class="edit_user" value="Update">
</form>