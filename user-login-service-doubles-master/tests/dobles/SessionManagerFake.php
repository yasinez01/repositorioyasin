<?php

namespace UserLoginService\Tests\dobles;

use UserLoginService\Application\SessionManager;

class SessionManagerFake implements SessionManager
{


    public function login(string $userName, string $password): bool{
        return ($userName=="YasinEz" && $password="2001yasin");
    }

    public function getSessions(): int
    {
        // TODO: Implement getSessions() method.
    }

    public function logout(string $userName): bool
    {
        // TODO: Implement logout() method.
    }
}