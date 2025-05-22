<?php

namespace Object;

use ORM\ORM;
use ORM\DTO;

require_once '../ORM/ORM.php';
require_once '../ORM/DTO.php';

class Registration extends ORM
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('users'); // имя таблицы, как в БД
    }

    public function register(DTO $dto): bool
    {
        $email = $dto->getEmail();

        // Проверка: логин уже существует
        if ($this->findLogin($email)) {
            return false; // пользователь уже есть
        }

        $password = password_hash($dto->getPassword(), PASSWORD_DEFAULT);

        return $this->create([
            'login' => $email,
            'password' => $password
        ]);
    }

}
