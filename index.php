<?php
namespace project;

ini_set('MEMORY_LIMIT', '128M');

if (!empty($_SESSION['user'])) {
    header('Location: pages/mycabinet.php');
    exit;
} else {
?>
<form action="pages/formHandler.php" method="POST" enctype="multipart/form-data">

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

    <button type="submit">Submit</button>

</form>
<?php
}
?>
