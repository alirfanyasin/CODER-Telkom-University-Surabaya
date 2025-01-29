<?php

namespace Tests\Feature\Modul;

use App\Models\Division;
use App\Models\ELeaning\Modul;
use App\Models\Label;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class DestroyModulTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test destroy modul.
     */
    public function test_destroy_modul(): void
    {
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => 'division-1',
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
            'name' => 'Modul Test',
            'slug' => 'modul-test',
            'description' => 'Deskripsi Modul Test',
            'section' => 'Section Test',
            'type' => 'Type Test',
            'link' => 'https://example.com',
            'division_id' => $division->id,
        ]);

        $this->assertDatabaseHas('moduls', ['id' => $modul->id]);
        $modul->delete();
        $this->assertDatabaseMissing('moduls', ['id' => $modul->id]);
    }
}
