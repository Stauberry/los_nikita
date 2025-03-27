<?php
session_start();
require_once "../classes/Registration.php";
require_once "../classes/Authorisation.php";

//use Object\User;
use Object\Registration;
use Object\Authorisation;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['action']) {
        case 'registration':
            $registration = new Registration();
            $registration->register($_POST['login'], $_POST['pass']);
            break;
        case('authorisation'):
            $authorization = new Authorisation();
            $authorization->authorise($_POST['login'], $_POST['pass']);
            break;
        default:
            echo "Invalid action";
            die();
    }
}
