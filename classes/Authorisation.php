<?php
namespace Object;
session_start();
interface AuthInterface
{
    public function authorise(string $login, string $pass): void;
}
class Authorisation implements AuthInterface {
    public function authorise(string $login, string $pass): void {
        $filePath = "../data/{$login}.json";

        if (!file_exists($filePath)) {
            die("User not found.");
        }

        $userData = json_decode(file_get_contents($filePath), true);

        if (password_verify($pass, $userData['password'])) {
            $_SESSION['user'] = ['login' => $login];
            header('Location: mycabinet.php');
            exit;
        } else {
            die("Invalid password.");
        }
    }
}
