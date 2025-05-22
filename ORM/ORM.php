<?php

namespace ORM;

use PDO;

abstract class ORM
{
    protected static ?PDO $db = null;
    protected string $table;

    public function __construct()
    {
        if (self::$db === null) {
            self::$db = require_once __DIR__ . '/config.php'; // Возвращает PDO
        }
    }

    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    public function findLogin(string $login): ?array
    {
        $stmt = self::$db->prepare("SELECT * FROM $this->table WHERE login = :login");
        $stmt->execute(['login' => $login]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function create(array $data): bool
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
        $stmt = self::$db->prepare($sql);
        return $stmt->execute($data);
    }
}
