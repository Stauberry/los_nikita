<?php
$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $login = htmlspecialchars($_POST['login']);
        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT); // Хэшируем пароль
        echo "Ваш логин: $login <br>";
        echo "Пароль сохранен в зашифрованном виде: $passwordHash <br>";
    } else {
        $error[] = [
            'code' => 1,
            'message' => 'no login'
        ];
        echo "Логин или пароль не указаны. <br>";
    }

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        echo 'Файл загружен: ' . $_FILES['avatar']['name'];
        $tmp_name = $_FILES['avatar']['tmp_name'];
        $target = "../uploads/" . basename($_FILES["avatar"]["name"]);

        if (!move_uploaded_file($tmp_name, $target)) {
            $error[] = [
                'code' => 2,
                'message' => 'no load image'
            ];
            echo 'Ошибка при загрузке файла. <br>';
        } else {
            $data['avatar'] = $target;
        }
    } else {
        echo 'Ошибка при загрузке файла. <br>';
    }

    if(empty($error)) {
        $file = '../data/users.txt';
        $userData = "Login: $login | Password: $passwordHash | Avatar: " . ($data['avatar'] ?? 'No file');
        file_put_contents($file, $userData);
        echo "Данные успешно сохранены в файл.<br>";
    } else {
        $error[] = [
            'code' => 3,
            'message' => 'unknown error'
        ];
    }
}
echo json_encode([
    'login' => $login,
    'password_hash' => $passwordHash,
    'avatar' => $data['avatar'],
]);
