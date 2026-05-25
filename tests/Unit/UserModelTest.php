<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /**
     * UT-USER-001: Memastikan atribut fillable sesuai konfigurasi
     */
    public function test_user_has_correct_fillable_attributes(): void
    {
        $user = new User();
        $expectedFillable = ['name', 'email', 'password'];

        $this->assertEquals($expectedFillable, $user->getFillable());
    }

    /**
     * UT-USER-002: Memastikan atribut hidden sesuai konfigurasi
     */
    public function test_user_has_correct_hidden_attributes(): void
    {
        $user = new User();
        $expectedHidden = ['password', 'remember_token'];

        $this->assertEquals($expectedHidden, $user->getHidden());
    }

    /**
     * UT-USER-003: Memastikan password di-cast ke hashed
     */
    public function test_user_casts_password_to_hashed(): void
    {
        $user = new User();
        $casts = $user->getCasts();

        $this->assertArrayHasKey('password', $casts);
        $this->assertEquals('hashed', $casts['password']);
    }

    /**
     * UT-USER-004: Memastikan email_verified_at di-cast ke datetime
     */
    public function test_user_casts_email_verified_at_to_datetime(): void
    {
        $user = new User();
        $casts = $user->getCasts();

        $this->assertArrayHasKey('email_verified_at', $casts);
        $this->assertEquals('datetime', $casts['email_verified_at']);
    }
}
