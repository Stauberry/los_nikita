<?php
session_start();

use ORM\DTO;
use Object\Registration;
use Object\Authorisation;

require_once __DIR__ . '/../ORM/DTO.php';
require_once __DIR__ . '/../Object/Registration.php';
require_once __DIR__ . '/../Object/Authorisation.php';


$login = $_POST['login'] ?? '';
$pass = $_POST['pass'] ?? '';

$hash = password_hash($pass, PASSWORD_DEFAULT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['action']) {
        case 'registration':
            $dto = new DTO($login, $hash);
            $reg = new Registration();

            if ($reg->register($dto)) {
                $_SESSION['user'] = $login;
                header('Location: /pages/mycabinet.php');
                exit;
            } else {
                echo "Ошибка: логин уже существует.";
            }

            break;

        case 'authorisation':
            $dto = new DTO($login, $hash);
            $auth = new Authorisation();

            if ($auth->login($dto)) {
                $_SESSION['user'] = $login;
                header('Location: mycabinet.php');
                exit;
            } else {
                echo "Неверный логин или пароль";
            }
            break;

        default:
            echo "Invalid action";
            die();
    }
}
