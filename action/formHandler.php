<?php
header('Content-Type: application/json; charset=utf-8');

ini_set('MEMORY_LIMIT', '128M');
include_once '../action/functions.php';
session_start();

$error = [];

$file = '../data/users.json';
$users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
if (!is_array($users)) {
    $users = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['action']) {
        case 'registration':

            // Проверяем существует ли такой логин
            if (!empty($_POST['login'])) {
                $login = htmlspecialchars($_POST['login']);
                foreach ($users as $user) {
                    if ($user['login'] === $login) {
                        $error[] = [
                            'code' => 2,
                            'message' => 'This login is already taken',
                        ];
                        break;
                    }
                }
            } else {
                $error[] = [
                    'code' => 2,
                    'message' => 'This login is invalid',
                ];
            }

            if (!empty($_POST['pass'])) {
                $salt = bin2hex(openssl_random_pseudo_bytes(16));
                $hashedPassword = hash('sha256', $salt . $_POST['pass']);
            } else {
                $error[] = [
                    'code' => 3,
                    'message' => 'Password is invalid',
                ];
            }

            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
                $tmp_name = $_FILES['avatar']['tmp_name'];
                $path = "../avatars/" . time() . basename($_FILES["avatar"]["name"]);
                if (move_uploaded_file($tmp_name, $path)) {
                    $data['avatar'] = $path;
                } else {
                    $error[] = [
                        'code' => 4,
                        'message' => 'Failed to upload image',
                    ];
                }
            }

            if (empty($error)) {
                $newUser = [
                    'login' => $login,
                    'password' => $hashedPassword,
                    'salt' => $salt, // Сохраняем соль в базе
                    'avatar' => $data['avatar'] ?? 'No file'
                ];
                $users[] = $newUser;
                file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo json_encode([
                    'login' => $login,
                    'password_hash' => $hashedPassword,
                    'avatar' => $data['avatar'],
                ]);
            } else {
                echo json_encode([
                    'error' => $error
                ]);
            }
            break;

        case 'authorisation':

            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['pass']);

            // Проверяем, существует ли логин
            $foundUser = null;
            foreach ($users as $user) {
                if ($user['login'] === $login) {
                    $foundUser = $user;
                    break;
                }
            }
            if (!$foundUser) {
                $error[] = [
                    'code' => 5,
                    'message' => 'Username not found',
                ];
                echo json_encode([
                    'error' => $error
                ]);
                exit;
                //в идеале должно откидывать назад, потом реализую
            }

            // Используем соль из бд и если пароль и соль совпадают то успех
            $hashedPassword = hash('sha256', $foundUser['salt'] . $password);
            if ($foundUser['password'] === $hashedPassword) {
                $_SESSION['user'] = [
                    'login' => $foundUser['login'],
                    'avatar' => $foundUser['avatar'],
                ];
                header('Location: success.php');
                exit;
            } else {
                $error[] = [
                    'code' => 6,
                    'message' => 'Wrong password',
                ];
            }

            if (!empty($error)) {
                echo json_encode([
                    'error' => $error
                ]);
            }
            break;

        default:
            die();
    }
}
