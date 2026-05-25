<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthIntegrationTest extends TestCase
{
    use RefreshDatabase;

    private function createAdmin(): User
    {
        return User::create([
            'name' => 'Admin Assabar',
            'email' => 'admin@assabar.co.id',
            'password' => bcrypt('password123'),
        ]);
    }

    /**
     * IT-AUTH-001: Login valid → Redirect ke admin + Session aktif
     */
    public function test_login_redirects_to_admin_and_creates_session(): void
    {
        $admin = $this->createAdmin();

        $response = $this->post(route('admin.login.post'), [
            'email' => 'admin@assabar.co.id',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $this->assertAuthenticatedAs($admin);
    }

    /**
     * IT-AUTH-002: Login invalid → Error + Kembali ke form
     */
    public function test_login_invalid_returns_error_and_redirects_back(): void
    {
        $this->createAdmin();

        $response = $this->from(route('admin.login'))->post(route('admin.login.post'), [
            'email' => 'salah@email.com',
            'password' => 'passwordsalah',
        ]);

        $response->assertRedirect(route('admin.login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /**
     * IT-AUTH-003: Login validasi → Reject input kosong
     */
    public function test_login_rejects_empty_input(): void
    {
        $response = $this->post(route('admin.login.post'), [
            'email' => '',
            'password' => '',
        ]);

        $response->assertSessionHasErrors(['email', 'password']);
        $this->assertGuest();
    }

    /**
     * IT-AUTH-004: Logout → Session dihapus + Redirect ke login
     */
    public function test_logout_destroys_session_and_redirects(): void
    {
        $admin = $this->createAdmin();
        $this->actingAs($admin);

        $response = $this->post(route('admin.logout'));

        $response->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }

    /**
     * IT-AUTH-005: Middleware auth → Guest di-redirect ke login
     */
    public function test_unauthenticated_user_is_redirected_to_login(): void
    {
        $response = $this->get(route('admin.products.index'));

        $response->assertRedirect(route('admin.login'));
    }

    /**
     * IT-AUTH-006: Middleware guest → User login di-redirect ke admin
     */
    public function test_authenticated_user_is_redirected_from_login_page(): void
    {
        $admin = $this->createAdmin();
        $this->actingAs($admin);

        $response = $this->get(route('admin.login'));

        // Guest middleware redirects authenticated user away from login page
        $response->assertRedirect();
    }

    /**
     * IT-AUTH-007: Alur lengkap: Login → Akses Admin → Logout → Ditolak
     */
    public function test_full_auth_flow_login_access_logout_denied(): void
    {
        $admin = $this->createAdmin();

        // Step 1: Login
        $this->post(route('admin.login.post'), [
            'email' => 'admin@assabar.co.id',
            'password' => 'password123',
        ]);
        $this->assertAuthenticatedAs($admin);

        // Step 2: Akses admin (berhasil)
        $response = $this->get(route('admin.products.index'));
        $response->assertStatus(200);

        // Step 3: Logout
        $this->post(route('admin.logout'));
        $this->assertGuest();

        // Step 4: Akses admin lagi (ditolak, redirect ke login)
        $response = $this->get(route('admin.products.index'));
        $response->assertRedirect(route('admin.login'));
    }
}
