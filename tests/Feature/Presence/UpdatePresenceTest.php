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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Tests\TestCase;

class UpdatePresenceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test halaman edit dapat diakses.
     */

    public function test_edit_presence_page_rendered(): void
    {
        $response = $this->get(route('app.presence.edit', ['id' => 1]));
        $response->assertStatus(302);
    }


    /**
     * Test update presence with valid data.
     */
    public function test_update_presence_with_valid_data()
    {
        // Create a division
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

        // Create a presence
        $presence = Presence::create([
            "date_time" => Carbon::now(),
            "section" => "Pertemuan ke 1",
            "status" => "active",
            "division_id" => $division->id,
        ]);

        // Data for updating presence
        $updateData = [
            "date_time" => Carbon::now()->addDay()->format('Y-m-d H:i'),
            "section" => "Pertemuan ke 2",
            "status" => "inActive",
        ];

        // Perform update
        $presence->update($updateData);

        // Assert database has updated data
        $this->assertDatabaseHas('presences', [
            "id" => $presence->id,
            "date_time" => $updateData["date_time"],
            "section" => $updateData["section"],
            "status" => $updateData["status"],
        ]);
    }




    /**
     * Test update presence with invalid data.
     */
    public function test_update_presence_with_invalid_data()
    {
        // Create a division
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

        // Create a presence
        $presence = Presence::create([
            "date_time" => Carbon::now(),
            "section" => "Pertemuan ke 1",
            "status" => "active",
            "division_id" => $division->id,
        ]);

        // Invalid data for updating presence
        $invalidData = [
            "date_time" => "invalid-date-format",
            "section" => "",
            "status" => "invalid-status",
        ];

        // Validation rules
        $validator = Validator::make($invalidData, [
            "date_time" => "required|date",
            "section" => "required|string|max:255",
            "status" => "required|in:active,inactive",
        ]);

        // Assert that validation fails
        $this->assertTrue($validator->fails());

        // Attempt to update and verify exception is thrown
        $this->expectException(\Exception::class);

        $presence->update($invalidData);

        // Assert database still has the original data
        $this->assertDatabaseHas('presences', [
            "id" => $presence->id,
            "date_time" => $presence->date_time,
            "section" => $presence->section,
            "status" => $presence->status,
        ]);

        // Assert database does not contain invalid data
        $this->assertDatabaseMissing('presences', [
            "id" => $presence->id,
            "date_time" => $invalidData["date_time"],
            "section" => $invalidData["section"],
            "status" => $invalidData["status"],
        ]);
    }
}
