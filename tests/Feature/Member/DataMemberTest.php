<?php

namespace Tests\Feature\Member;

use App\Models\Division;
use App\Models\Label;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class DataMemberTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test member rendered.
     */

    public function test_member_page_rendered(): void
    {
        $response = $this->get(route('app.member'));
        $response->assertStatus(302);
    }

    /**
     *  Test show member page with auth.
     */
    public function test_show_member_page_with_auth(): void
    {
        // Create division
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1') . uniqid(),
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
        // Act as the created user
        $response = $this->actingAs($user)->get(route('app.member.show', ['id' => $user->id, 'name' => $user->name]));

        // Assert that the response is successful
        $response->assertStatus(200);
    }


    /**
     * Test show member page without auth.
     */
    public function test_show_member_page_without_auth(): void
    {
        // Create division
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1') . uniqid(),
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

        // Access the route without authentication
        $response = $this->get(route('app.member.show', ['id' => $user->id, 'name' => $user->name]));

        // Assert that the response is a redirect (to login page)
        $response->assertRedirect(route('login'));
    }
}
