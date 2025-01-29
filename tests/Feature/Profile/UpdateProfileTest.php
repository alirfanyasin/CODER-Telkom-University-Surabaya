<?php

namespace Tests\Feature\Profile;

use App\Models\Division;
use App\Models\Label;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class UpdateProfileTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test profile rendered.
     */

    public function test_edit_profile_page_rendered(): void
    {
        $response = $this->get(route('app.profile.edit'));
        $response->assertStatus(302);
    }


    /**
     * Test profile updated.
     */

    public function test_profile_updated_with_valid_data(): void
    {
        // Membuat data division
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1'),
            'description' => 'Deskripsi Division 1',
            'logo' => 'logo.png',
        ]);

        // Membuat user anggota division
        $user = User::factory()->create([
            'name' => 'Anggota ' . $division->name,
            'email' => strtolower(str_replace(" ", "", $division->name . uniqid())) . '@gmail.com',
            'password' => Hash::make('password'),
            'label' => Label::LABEL_NAME['user'] . $division->name,
            'identity_code' => 'ID-' . strtoupper(Str::random(10)),
            'division_id' => $division->id,
        ]);

        // Otentikasi pengguna
        $this->actingAs($user);

        // Data untuk memperbarui profil
        $updateData = [
            'name' => 'Updated Name',
            'email' => 'updatedemail@gmail.com',
            'major' => 'Updated Major',
            'label' => 'Anggota Division 1',
            'nim' => '1234567890',
            'batch' => '2025',
            'phone_number' => '081234567890',
            'avatar' => 'avatar.png',
            'github' => 'https://github.com/updateduser',
            'identity_code' => $user->identity_code,
            'division_id' => $division->id,
            'tag' => 'Updated Tag',
        ];

        // Memanggil metode pembaruan profil
        $user->update($updateData);

        // Verifikasi data di database
        $this->assertDatabaseHas('users', $updateData);
    }



    public function test_profile_update_fails_with_invalid_data(): void
    {
        // Membuat data division
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1'),
            'description' => 'Deskripsi Division 1',
            'logo' => 'logo.png',
        ]);

        // Membuat user anggota division
        $user = User::factory()->create([
            'name' => 'Anggota ' . $division->name,
            'email' => strtolower(str_replace(" ", "", $division->name . uniqid())) . '@gmail.com',
            'password' => Hash::make('password'),
            'label' => Label::LABEL_NAME['user'] . $division->name,
            'identity_code' => 'ID-' . strtoupper(Str::random(10)),
            'division_id' => $division->id,
        ]);

        // Otentikasi pengguna
        $this->actingAs($user);

        // Data untuk memperbarui profil dengan data yang tidak valid
        $invalidData = [
            'name' => '', // Kosong, seharusnya tidak valid
            'email' => 'invalid-email', // Format email tidak valid
            'major' => null, // Bisa dianggap tidak valid jika wajib
            'label' => 'Anggota Division 1',
            'nim' => 'not-a-number', // Nim harus angka
            'batch' => '202X', // Batch tidak sesuai format
            'phone_number' => 'invalid-phone', // Nomor telepon tidak valid
            'github' => 'not-a-url', // URL tidak valid
            'identity_code' => $user->identity_code,
            'division_id' => null, // Tidak valid jika wajib
            'tag' => null, // Tidak valid jika wajib
        ];



        $user->update($invalidData);

        // Pastikan data di database tidak berubah
        $this->assertDatabaseMissing('users', $invalidData);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $user->name, // Tetap sesuai data asli
            'email' => $user->email,
            'major' => $user->major,
            'division_id' => $user->division_id,
        ]);
    }
}
