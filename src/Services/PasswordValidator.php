<?php

declare(strict_types=1);

namespace App\Services;

interface PasswordValidator
{
    public function validate(string $password): bool;
}
