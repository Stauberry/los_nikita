<?php
session_start();
?>

<form action="formHandler.php" method="POST" enctype="multipart/form-data">
    <label for="action">Action</label>
    <select name="action" id="action">
        <option value="registration">Registration</option>
        <option value="authorisation">Authorisation</option>
    </select>
    <br>
    <label for="login">Login</label>
    <input type="text" name="login" id="login" required>
    <br>
    <label for="pass">Password</label>
    <input type="password" name="pass" id="pass" required>
    <br>
<!--    <label for="avatar">Avatar</label>-->
<!--    <input type="file" name="avatar" >-->
<!--    <br>-->
    <button type="submit">Submit</button>
</form>
