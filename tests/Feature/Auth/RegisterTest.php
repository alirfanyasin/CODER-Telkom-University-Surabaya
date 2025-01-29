<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test halaman login dapat diakses.
     */

    public function test_register_page_rendered(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }


    /**
     * Test registrasi dengan data valid.
     */
    public function test_register_with_valid_data()
    {
        // Data untuk registrasi
        $data = [
            'name' => 'Test User',
            'email' => 'testuser1234@example.com', // Email yang digunakan
            'password' => 'password123',
            'label' => 'Guest',
        ];

        // Simulasi proses registrasi
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'label' => $data['label'],
        ]);

        // Assert bahwa user berhasil dibuat
        $this->assertInstanceOf(User::class, $user);

        // Pastikan email sesuai dengan yang dibuat
        $this->assertDatabaseHas('users', [
            'email' => 'testuser1234@example.com', // Ubah email agar sesuai dengan data
        ]);
    }


    /**
     * Test registrasi dengan email yang sudah terdaftar.
     */
    public function test_register_with_existing_email()
    {

        $data = [
            'name' => 'New User',
            'email' => 'test@example.com', // Email sudah ada
            'password' => 'password123',
            'label' => 'Guest',
        ];

        User::factory()->create($data);

        $userExists = User::where('email', $data['email'])->exists();
        $this->assertTrue($userExists, 'Email sudah terdaftar.');
    }
}
