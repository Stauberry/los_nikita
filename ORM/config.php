<?php

$dsn = "mysql:host=db;dbname=test;charset=utf8mb4";
$user = "user";
$pass = "user";

try {
    $db = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die("DB connection failed: " . $e->getMessage());
}

return $db;
