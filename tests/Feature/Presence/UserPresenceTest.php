<?php

namespace Tests\Feature\Presence;

use App\Models\Division;
use App\Models\Label;
use App\Models\Presence;
use App\Models\User;
use App\Models\UserPresence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserPresenceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_it_can_create_user_presence_with_valid_data()
    {
        // Create division
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1') . uniqid(),
            'description' => 'Deskripsi Division 1',
            'logo' => 'logo.png',
        ]);


        // User - Anggota Division
        $user = User::factory()->create([
            'name' => 'Anggota ' . $division->name,
            'email' => strtolower(str_replace(" ", "", $division->name . uniqid())) . '@gmail.com',
            'password' => Hash::make('password'),
            'label' => Label::LABEL_NAME['user'] . $division->name,
            'identity_code' => 'ID-' . strtoupper(Str::random(10)),
            'division_id' => $division->id,
        ]);

        // Autentikasi pengguna
        $this->actingAs($user);

        // Create a presence
        $presence = Presence::create([
            'date_time' => now(),
            'section' => 'Pertemuan 1',
            'status' => 'active',
            'division_id' => $division->id,
        ]);

        // Create a user presence
        $userPresence = UserPresence::create([
            'user_id' => $user->id,
            'presences_id' => $presence->id,
            'status' => 'hadir',
        ]);

        // Assert database contains the created user presence
        $this->assertDatabaseHas('user_presences', [
            'user_id' => $user->id,
            'presences_id' => $presence->id,
            'status' => 'hadir',
        ]);
    }



    public function test_it_can_update_user_presence_status()
    {
        // Create division
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1') . uniqid(),
            'description' => 'Deskripsi Division 1',
            'logo' => 'logo.png',
        ]);

        // User - Anggota Division
        $user = User::factory()->create([
            'name' => 'Anggota ' . $division->name,
            'email' => strtolower(str_replace(" ", "", $division->name . uniqid())) . '@gmail.com',
            'password' => Hash::make('password'),
            'label' => Label::LABEL_NAME['user'] . $division->name,
            'identity_code' => 'ID-' . strtoupper(Str::random(10)),
            'division_id' => $division->id,
        ]);

        // Autentikasi pengguna
        $this->actingAs($user);

        // Create a presence
        $presence = Presence::create([
            'date_time' => now(),
            'section' => 'Pertemuan 1',
            'status' => 'active',
            'division_id' => $division->id,
        ]);

        // Create a user presence
        $userPresence = UserPresence::create([
            'user_id' => $user->id,
            'presences_id' => $presence->id,
            'status' => 'hadir',
        ]);

        // Update the user presence status
        $userPresence->update(['status' => 'izin']);

        // Assert the database has the updated status
        $this->assertDatabaseHas('user_presences', [
            'user_id' => $user->id,
            'presences_id' => $presence->id,
            'status' => 'izin',
        ]);
    }


    public function test_it_can_delete_user_presence()
    {
        // Create division
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1') . uniqid(),
            'description' => 'Deskripsi Division 1',
            'logo' => 'logo.png',
        ]);

        // User - Anggota Division
        $user = User::factory()->create([
            'name' => 'Anggota ' . $division->name,
            'email' => strtolower(str_replace(" ", "", $division->name . uniqid())) . '@gmail.com',
            'password' => Hash::make('password'),
            'label' => Label::LABEL_NAME['user'] . $division->name,
            'identity_code' => 'ID-' . strtoupper(Str::random(10)),
            'division_id' => $division->id,
        ]);

        // Autentikasi pengguna
        $this->actingAs($user);

        // Create a presence
        $presence = Presence::create([
            'date_time' => now(),
            'section' => 'Pertemuan 1',
            'status' => 'active',
            'division_id' => $division->id,
        ]);

        // Create a user presence
        $userPresence = UserPresence::create([
            'user_id' => $user->id,
            'presences_id' => $presence->id,
            'status' => 'hadir',
        ]);

        // Delete the user presence
        $userPresence->delete();

        // Assert the database does not have the deleted user presence
        $this->assertDatabaseMissing('user_presences', [
            'user_id' => $user->id,
            'presences_id' => $presence->id,
            'status' => 'hadir',
        ]);
    }
}
