<?php

namespace Tests\Feature\Report;

use App\Models\Division;
use App\Models\Label;
use App\Models\Report;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class DestroyReportTest extends TestCase
{
    /**
     * Test destroy quiz.
     */
    public function test_destroy_report(): void
    {
        // Membuat data division
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1') . uniqid(),
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

        $reportData = [
            'type' => 'Modul',
            'date' => '2025-01-10',
            'file' => 'report-file.pdf',
            'division_id' => $division->id,
        ];
        // Create the quiz
        $quiz = Report::create($reportData);
        $this->assertDatabaseHas('reports', ['id' => $quiz->id]);
        $quiz->delete();
        $this->assertDatabaseMissing('reports', ['id' => $quiz->id]);
    }
}
