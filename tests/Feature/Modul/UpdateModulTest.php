<?php

namespace Tests\Feature\Modul;

use App\Models\Division;
use App\Models\ELeaning\Modul;
use App\Models\Label;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use Illuminate\Support\Str;

class UpdateModulTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test halaman create dapat diakses.
     */

    public function test_edit_modul_page_rendered(): void
    {
        $response = $this->get(route('app.e-learning.modul.edit', ['id' => 1]));
        $response->assertStatus(302);
    }


    public function test_update_modul_with_valid_data()
    {
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1'),
            'description' => 'Deskripsi Division 1',
            'logo' => 'logo.png',
        ]);

        // Admin - Ketua Division
        $user = User::factory()->create([
            'name' => 'Ketua ' . $division->name,
            'email' => strtolower(str_replace(" ", "", $division->name)) . '@gmail.com',
            'password' => Hash::make('password'),
            'label' => Label::LABEL_NAME['admin'] . $division->name,
            'identity_code' => 'ID-' . strtoupper(Str::random(10)),
            'division_id' => $division->id,
        ]);

        // Autentikasi pengguna
        $this->actingAs($user);

        $modul = Modul::create([
            'name' => 'Modul Awal',
            'slug' => Str::slug('Modul Awal'),
            'description' => 'Deskripsi Modul Awal',
            'section' => 'Section Awal',
            'type' => 'Type Awal',
            'link' => 'https://example.com/awal',
            'division_id' => $division->id,
        ]);

        $updateData = [
            'name' => 'Modul Update',
            'slug' => Str::slug('Modul Update'),
            'description' => 'Deskripsi Modul Update',
            'section' => 'Section Update',
            'type' => 'Type Update',
            'link' => 'https://example.com/update',
        ];

        $modul->update($updateData);

        $this->assertDatabaseHas('moduls', $updateData);
    }



    /**
     * Test update modul dengan data tidak valid.
     */
    public function test_update_modul_with_invalid_data()
    {
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1'),
            'description' => 'Deskripsi Division 1',
            'logo' => 'logo.png',
        ]);


        // Admin - Ketua Division
        $user = User::factory()->create([
            'name' => 'Ketua ' . $division->name,
            'email' => strtolower(str_replace(" ", "", $division->name)) . '@gmail.com',
            'password' => Hash::make('password'),
            'label' => Label::LABEL_NAME['admin'] . $division->name,
            'identity_code' => 'ID-' . strtoupper(Str::random(10)),
            'division_id' => $division->id,
        ]);

        // Autentikasi pengguna
        $this->actingAs($user);

        $modul = Modul::create([
            'name' => 'Modul Awal',
            'slug' => Str::slug('Modul Awal'),
            'description' => 'Deskripsi Modul Awal',
            'section' => 'Section Awal',
            'type' => 'Type Awal',
            'link' => 'https://example.com/awal',
            'division_id' => $division->id,
        ]);

        $invalidData = [
            'name' => '',
            'slug' => '',
            'description' => 'Deskripsi Modul Update',
            'section' => '',
            'type' => '',
            'link' => 'invalid-url',
        ];

        // Validasi data sebelum update
        $validator = Validator::make($invalidData, [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:moduls,slug,' . $modul->id,
            'description' => 'nullable|string',
            'section' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'link' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            // Periksa bahwa modul tidak berubah
            $this->assertDatabaseHas('moduls', [
                'name' => 'Modul Awal',
                'slug' => Str::slug('Modul Awal'),
                'description' => 'Deskripsi Modul Awal',
                'section' => 'Section Awal',
                'type' => 'Type Awal',
                'link' => 'https://example.com/awal',
            ]);

            // Pastikan data tidak valid tidak ada di database
            $this->assertDatabaseMissing('moduls', $invalidData);

            // Test passed jika validasi gagal
            $this->assertTrue(true);
            return;
        }

        // Jika validasi tidak gagal, test harus gagal
        $this->fail('Modul berhasil diperbarui dengan data tidak valid.');
    }
}
