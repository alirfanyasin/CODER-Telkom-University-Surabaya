<?php

namespace Tests\Feature\Presence;

use App\Models\Division;
use App\Models\Label;
use App\Models\Presence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class DestroyPresenceTest extends TestCase
{
    use RefreshDatabase;

    public function test_destroy_presence()
    {
        // Buat sebuah division
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => 'division-' . uniqid(),
            'description' => 'Deskripsi Division 1',
            'logo' => 'logo.png',
        ]);

        // Admin - Ketua Division
        $user = User::factory()->create([
            'name' => 'Ketua ' . $division->name,
            'email' => strtolower(str_replace(" ", "", $division->name . uniqid())) . '@gmail.com',
            'password' => Hash::make('password'),
            'label' => Label::LABEL_NAME['admin'] . $division->name,
            'identity_code' => 'ID-' . strtoupper(Str::random(10)),
            'division_id' => $division->id,
        ]);

        // Autentikasi pengguna
        $this->actingAs($user);


        // Buat sebuah presence
        $presence = Presence::create([
            "date_time" => Carbon::now(),
            "section" => "Pertemuan ke 1",
            "status" => "active",
            "division_id" => $division->id,
        ]);

        // Pastikan presence ada di database sebelum dihapus
        $this->assertDatabaseHas('presences', [
            "id" => $presence->id,
            "date_time" => $presence->date_time->format('Y-m-d H:i:s'),
            "section" => $presence->section,
            "status" => $presence->status,
            "division_id" => $division->id,
        ]);

        // Hapus presence
        $presence->delete();

        // Pastikan presence tidak ada di database setelah dihapus
        $this->assertDatabaseMissing('presences', [
            "id" => $presence->id,
            "date_time" => $presence->date_time->format('Y-m-d H:i:s'),
            "section" => $presence->section,
            "status" => $presence->status,
            "division_id" => $division->id,
        ]);
    }
}
