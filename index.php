<?php
session_start();
require_once "classes/User.php";
use Object\User;

$user = new User();

if ($user->getStatus() !== 'guest') {
    header('Location: pages/mycabinet.php');
    exit;
} else {
    header('Location: pages/form.php');
    exit;
}
