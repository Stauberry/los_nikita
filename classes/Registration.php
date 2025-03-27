<?php
namespace Object;
session_start();
class Registration
{
    public function register($login, $pass)
    {
        $filePath = "../data/{$login}.json";

        if (file_exists($filePath)) {
            die("User already exists.");
        }

        $userData = [
            'login' => $login,
            'password' => password_hash($pass, PASSWORD_DEFAULT)
        ];
        file_put_contents($filePath, json_encode($userData));

        $_SESSION['user'] = ['login' => $login];
        header('Location: mycabinet.php');
        exit;
    }
}

//interface RegInterface
//{
//    public function __construct($login, $pass, $userAvatar);
//}

//class Registration implements RegInterface
//{
//    private array $userData = [];
//    private array $userAvatar;
//    private array $errors = [];
//
//    public function __construct($login, $pass, $userAvatar)
//    {
//        $this->userData['login'] = htmlspecialchars($login);
//        $this->userData['password'] = $pass;
//        $this->userAvatar = $userAvatar;
//
//        return $this;
//    }
