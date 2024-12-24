<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * Test halaman login dapat diakses.
     */
    public function test_login_page_rendered()
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200)
            ->assertSee('Login');
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
     * Test validasi email yang salah.
     */
    public function test_login_with_invalid_email()
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'label' => 'Guest',
        ]);

        $wrongEmail = 'testtt@gmail.com'; // email yang salah

        $credentials = ['email' => $wrongEmail, 'password' => 'password123'];
        $isAuthenticated = Auth::attempt($credentials);

        $this->assertTrue($isAuthenticated, 'Login berhasil dengan kredensial valid.');
        Auth::logout();
    }
}
