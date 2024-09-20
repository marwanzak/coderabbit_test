<?php

namespace App\Services;

use Exception;

class UserPasswordValidator implements PasswordValidator
{
    private const PASSWORD_MIN_LENGTH = 6;

    public function validate(string $password): bool
    {
        try {
            $this->checkLength($password);
            $this->checkContainsOneNumberAtLeast($password);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    private function checkLength(string $password): void
    {
        if (strlen($password) <= self::PASSWORD_MIN_LENGTH) {
            throw new Exception;
        }
    }

    private function checkContainsOneNumberAtLeast(string $password): void
    {
        if (!preg_match('/\d+/', $password)) {
            throw new Exception;
        }
    }
}
