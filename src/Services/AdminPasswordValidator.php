<?php

declare(strict_types=1);

namespace App\Services;

use Exception;

class AdminPasswordValidator implements PasswordValidator
{
    const PASSWORD_MIN_LENGTH = 16;
    
    public function validate(string $password): bool
    {
        try {
            $this->checkLength($password);
            $this->checkContainsUnderscore($password);
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

    private function checkContainsUnderscore(string $password): void
    {
        if (strpos('_', $password) === false) {
            throw new Exception;
        }
    }
}
