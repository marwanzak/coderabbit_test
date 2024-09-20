<?php

declare(strict_types=1);

use App\Services\PasswordValidator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    private PasswordValidator $passwordValidator;
    
    public function testItValidatesPassword(): void
    {
        //when
        $result = $this->passwordValidator->validate('11mmmm23');

        //then
        $this->assertTrue($result);
    }

    public function setUp(): void
    {
        $this->passwordValidator = new PasswordValidator();
    }
}
