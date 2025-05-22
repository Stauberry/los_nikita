<?php

namespace Object;

use ORM\ORM;
use ORM\DTO;

require_once '../ORM/ORM.php';
require_once '../ORM/DTO.php';

class Authorisation extends ORM
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('users');
    }

    public function login(DTO $dto): bool
    {
        $user = $this->findLogin($dto->getEmail());

        if ($user && password_verify($dto->getPassword(), $user['password'])) {
            return true;
        }

        return false;
    }
}
