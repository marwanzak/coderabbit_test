<?php

declare(strict_types=1);

use App\Services\PasswordValidator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    private PasswordValidator $passwordValidator;
    /**
     * @test
     * @dataProvider passwordProvider
     */
    public function it_validates_password(string $password): void
    {
        //when
        $result = $this->passwordValidator->validate($password);

        //then
        $this->assertTrue($result);
    }

    public function passwordProvider(): iterable
    {
        yield ['123456789_'];
    }

    public function setUp(): void
    {
        $this->passwordValidator = new PasswordValidator();
    }
}
