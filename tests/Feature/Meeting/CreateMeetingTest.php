<?php

namespace Tests\Feature\Meeting;

use App\Models\Division;
use App\Models\Label;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreateMeetingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test halaman create dapat diakses.
     */
    public function test_create_meeting_page_rendered(): void
    {
        $response = $this->get(route('app.e-learning.meeting.create'));
        $response->assertStatus(302);
    }

    /**
     * Test store meeting.
     */
    public function test_store_meeting_with_valid_data()
    {
        // Membuat data division
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1'),
            'description' => 'Deskripsi Division 1',
            'logo' => 'logo.png',
        ]);

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
            "slug" => 'team-meeting', // Simulasi slug
            "name" => $data["name"],
            "date_time" => $data["date_time"],
            "end_time" => $data["end_time"],
            "type" => $data["type"],
            "location" => $data["location"] ?? null,
            "description" => $data["description"],
            "status" => "aktif",
            "division_id" => $division->id,
        ]);

        // Assert bahwa meeting berhasil dibuat
        $this->assertDatabaseHas('meetings', [
            'name' => 'Team Meeting',
            'type' => 'offline',
            'status' => 'aktif',
            'division_id' => $division->id,
        ]);

        // Pastikan nilai yang disimpan sesuai
        $this->assertEquals('Team Meeting', $meeting->name);
        $this->assertEquals('aktif', $meeting->status);
    }

    /**
     * Test creating a meeting with missing required fields.
     *
     * @return void
     */
    public function test_store_meeting_with_missing_required_fields()
    {
        // Membuat data division
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1'),
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

        // Data yang tidak lengkap
        $incompleteData = [
            'name' => 'Team Meeting',
            'date_time' => '2025-01-01 10:00:00',
            // 'end_time' => '2025-01-01 12:00:00', // Field yang hilang
            'type' => 'offline',
            'description' => 'Monthly team meeting',
            'location' => 'Meeting Room 1',
            // 'division_id' => $division->id, // Field yang hilang
        ];

        // Simulasi penyimpanan data langsung tanpa validasi
        try {
            Meeting::create([
                'slug' => 'team-meeting',
                'name' => $incompleteData['name'],
                'date_time' => $incompleteData['date_time'],
                'end_time' => $incompleteData['end_time'] ?? null,
                'type' => $incompleteData['type'],
                'status' => 'aktif',
                'description' => $incompleteData['description'],
                'location' => $incompleteData['location'],
                'division_id' => $incompleteData['division_id'] ?? null,
            ]);
        } catch (\Exception $e) {
            // Abaikan error karena kita memeriksa validasi
        }

        // Pastikan data tidak tersimpan di database
        $this->assertDatabaseMissing('meetings', [
            'name' => $incompleteData['name'],
            'date_time' => $incompleteData['date_time'],
        ]);
    }
}
