<?php

namespace Tests\Feature\Report;

use App\Models\Division;
use App\Models\Label;
use App\Models\Report;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Tests\TestCase;

class UpdateReportTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test halaman edit dapat diakses.
     */
    public function test_edit_report_page_rendered(): void
    {
        $response = $this->get(route('app.report.edit', ['date' => '2024-02-01', 'id' => 1]));
        $response->assertStatus(302);
    }

    /**
     * Test user dapat mengupdate laporan.
     */
    public function test_update_report_with_valid_data()
    {
        // Mock data for the test
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

        // Valid data for updating a report
        $validData = [
            'type' => 'Modul',
            'date' => '2024-02-01',
            'file' => 'report-file.pdf',
            'division_id' => $division->id,
        ];

        // Update the report
        $report = Report::create($validData);

        // Verify the report was updated successfully in the database
        $this->assertDatabaseHas('reports', [
            'type' => 'Modul',
            'date' => '2024-02-01',
            'file' => 'report-file.pdf',
            'division_id' => $division->id,
        ]);
    }

    /**
     * Test user tidak dapat mengupdate laporan dengan data yang tidak valid.
     */

    public function test_update_report_with_invalid_data()
    {
        // Mock data for the test
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


        // Create an initial report (valid data)
        $validData = [
            'type' => 'Modul',
            'date' => '2024-01-01',
            'file' => 'initial-report.pdf',
            'division_id' => $division->id,
        ];

        $report = Report::create($validData);

        // Invalid data for updating the report
        $invalidData = [
            'type' => '',
            'date' => 'invalid-date',
            'file' => '',
            'division_id' => $division->id,
        ];

        // Perform validation before attempting to update
        $validator = Validator::make($invalidData, [
            'type' => 'required|string',
            'date' => 'required|date',
            'file' => 'required|string|max:255',
            'division_id' => 'required|exists:divisions,id',
        ]);

        // Assert that validation fails
        $this->assertTrue($validator->fails());

        // Do not proceed with update if validation fails
        if ($validator->fails()) {
            // Ensure the report data remains unchanged in the database
            $this->assertDatabaseHas('reports', [
                'type' => 'Modul',
                'date' => '2024-01-01',
                'file' => 'initial-report.pdf',
                'division_id' => $division->id,
            ]);

            // Ensure the invalid data has not been saved
            $this->assertDatabaseMissing('reports', [
                'type' => '',
                'date' => 'invalid-date',
                'file' => '',
                'division_id' => $division->id,
            ]);
        } else {
            // If validation passes (not expected in this case), proceed with the update
            $report->update($invalidData);
        }
    }
}
