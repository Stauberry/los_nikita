<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Form</title>
</head>
<body>
<?php
session_start();
?>
<form action="/action/formHandler.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="action" class="form-label">Action</label>
        <select name="action" id="action" class="form-control">
            <option value="registration">Registration</option>
            <option value="authorisation">Authorisation</option>
        </select>
    </div>

    <div class="form-group">
        <label for="username" class="form-label">Login</label>
        <input type="text" name="login" class="form-control" id="reg-username" placeholder="Enter login" required>
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="pass" class="form-control" id="reg-password" placeholder="Enter password" required>
    </div>
    <div class="form-group" id="avatar-group">
        <label for="avatar" class="form-label">Avatar</label>
        <input type="file" name="avatar" id="avatar" accept="image/*">
    </div>
    <button type="submit">Submit</button>
</form>

</body>
</html>