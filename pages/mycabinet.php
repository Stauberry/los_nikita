<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: form.php');
    exit;
}

echo "Welcome, " . $_SESSION['user']['login'];
?>

<a href="logout.php">Log out</a>
