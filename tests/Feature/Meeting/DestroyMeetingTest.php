<?php

namespace Tests\Feature\Meeting;

use App\Models\Division;
use App\Models\Label;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class DestroyMeetingTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test destroy modul.
     */
    public function test_destroy_meeting(): void
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


        // Data input untuk membuat meeting
        $data = [
            'name' => 'Team Meeting',
            'date_time' => '2025-01-01 10:00:00',
            'end_time' => '2025-01-01 12:00:00',
            'type' => 'offline',
            'location' => 'Meeting Room 1',
            'description' => 'Monthly team meeting',
        ];

        // Panggil fungsi create meeting
        $meeting = Meeting::create([
            "slug" => Str::slug($data['name']),
            "name" => $data["name"],
            "date_time" => $data["date_time"],
            "end_time" => $data["end_time"],
            "type" => $data["type"],
            "location" => $data["location"] ?? null,
            "description" => $data["description"],
            "status" => "aktif",
            "division_id" => $division->id,
        ]);
        $this->assertDatabaseHas('meetings', ['id' => $meeting->id]);
        $meeting->delete();
        $this->assertDatabaseMissing('meetings', ['id' => $meeting->id]);
    }
}
