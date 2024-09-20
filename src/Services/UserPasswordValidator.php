<?php

namespace App\Services;

use Exception;

class UserPasswordValidator implements PasswordValidator
{
    private const PASSWORD_MIN_LENGTH = 6;

    public function validate(string $password): bool
    {
        if (
            !$this->checkLength($password) ||
            !$this->checkContainsOneNumberAtLeast($password)
        ) {
            return false;
        }
        return true;
    }

    private function checkLength(string $password): bool
    {
        return strlen($password) >= self::PASSWORD_MIN_LENGTH;
    }

    private function checkContainsOneNumberAtLeast(string $password): bool
    {
        return preg_match('/\d+/', $password);
    }
}
