<?php

namespace Tests\Unit;

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * UT-AUTH-001: Login berhasil dengan kredensial valid
     */
    public function test_login_with_valid_credentials(): void
    {
        $user = User::create([
            'name' => 'Admin Assabar',
            'email' => 'admin@assabar.co.id',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post(route('admin.login.post'), [
            'email' => 'admin@assabar.co.id',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * UT-AUTH-002: Login gagal dengan kredensial invalid
     */
    public function test_login_with_invalid_credentials(): void
    {
        User::create([
            'name' => 'Admin Assabar',
            'email' => 'admin@assabar.co.id',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post(route('admin.login.post'), [
            'email' => 'wrong@email.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /**
     * UT-AUTH-003: Login menolak email kosong
     */
    public function test_login_rejects_empty_email(): void
    {
        $response = $this->post(route('admin.login.post'), [
            'email' => '',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /**
     * UT-AUTH-004: Logout berhasil
     */
    public function test_logout_successfully(): void
    {
        $user = User::create([
            'name' => 'Admin Assabar',
            'email' => 'admin@assabar.co.id',
            'password' => bcrypt('password123'),
        ]);

        $this->actingAs($user);

        $response = $this->post(route('admin.logout'));

        $response->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }

    /**
     * UT-AUTH-005: Show login redirect jika sudah login (guest middleware)
     */
    public function test_show_login_redirects_if_authenticated(): void
    {
        $user = User::create([
            'name' => 'Admin Assabar',
            'email' => 'admin@assabar.co.id',
            'password' => bcrypt('password123'),
        ]);

        $this->actingAs($user);

        $response = $this->get(route('admin.login'));

        // Guest middleware redirects authenticated user away from login page
        $response->assertRedirect();
    }
}
