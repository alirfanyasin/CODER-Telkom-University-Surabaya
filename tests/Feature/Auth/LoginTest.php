<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{

    use RefreshDatabase;
    /**
     * Test halaman login dapat diakses.
     */
    public function test_login_page_rendered()
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
    }


    /**
     * Test login dengan kredensial yang benar.
     */
    public function test_login_with_valid_credentials()
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'label' => 'Guest',
        ]);

        $credentials = ['email' => 'test@example.com', 'password' => 'password123'];
        $isAuthenticated = Auth::attempt($credentials);

        $this->assertTrue($isAuthenticated, 'Login berhasil dengan kredensial valid.');
        Auth::logout();
    }


    /**
     * Test login dengan email yang salah.
     */
    public function test_login_with_invalid_email()
    {
        // Buat pengguna dengan email tertentu
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password123'),
            'label' => 'Guest',
        ]);

        // Gunakan email yang salah
        $wrongEmail = 'test@gmail.com'; // email yang salah
        $credentials = ['email' => $wrongEmail, 'password' => 'password123'];

        // Cek apakah login gagal
        $isAuthenticated = Auth::attempt($credentials);

        // Login harus gagal
        $this->assertFalse($isAuthenticated, 'Login seharusnya gagal dengan email yang salah.');
    }
}
