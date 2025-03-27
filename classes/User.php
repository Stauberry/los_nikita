<?php
namespace Object;
session_start();
class User {
    public function getStatus() {
        return isset($_SESSION['user']) ? 'logged' : 'guest';
    }
}
?>
