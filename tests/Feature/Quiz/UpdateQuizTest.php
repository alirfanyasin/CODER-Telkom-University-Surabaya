<?php

namespace Tests\Feature\Quiz;

use App\Models\Division;
use App\Models\Label;
use App\Models\Quiz\Quiz;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Tests\TestCase;

class UpdateQuizTest extends TestCase
{

    use RefreshDatabase;
    /**
     * Test halaman create dapat diakses.
     */

    public function test_edit_quiz_page_rendered(): void
    {
        $response = $this->get(route('app.e-learning.quiz.edit', ['code' => 'ABC123', 'id' => 1]));
        $response->assertStatus(302);
    }


    /**
     * Test update quiz with valid data.
     */
    public function test_update_quiz_with_valid_data()
    {
        // Membuat data division dengan slug unik
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1') . '-' . uniqid(),
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


        // Membuat data quiz awal dengan slug unik
        $quiz = Quiz::create([
            'title' => 'Old Quiz Title',
            'slug' => Str::slug('Old Quiz Title') . '-' . uniqid(),
            'thumbnail' => 'old-thumbnail.jpg',
            'status' => 'public',
            'code' => 'OLD123',
            'division_id' => $division->id,
        ]);

        // Data untuk update quiz
        $updateData = [
            'title' => 'Updated Quiz Title',
            'slug' => Str::slug('Updated Quiz Title') . '-' . uniqid(), // Pastikan slug unik
            'thumbnail' => 'updated-thumbnail.jpg',
            'status' => 'private',  // Status diubah menjadi 'private'
            'code' => 'NEW123',
            'division_id' => $division->id,
        ];

        // Melakukan update quiz
        $quiz->update($updateData);

        // Periksa jika quiz berhasil diperbarui di database
        $this->assertDatabaseHas('quizzes', [
            'title' => $updateData['title'],
            'slug' => $updateData['slug'],
            'thumbnail' => $updateData['thumbnail'],
            'status' => $updateData['status'],
            'code' => $updateData['code'],
            'division_id' => $division->id,
        ]);

        // Pastikan data sebelumnya sudah tidak ada di database
        $this->assertDatabaseMissing('quizzes', [
            'title' => 'Old Quiz Title',
            'slug' => Str::slug('Old Quiz Title') . '-' . uniqid(),
            'thumbnail' => 'old-thumbnail.jpg',
            'status' => 'public',
            'code' => 'OLD123',
        ]);
    }



    /**
     * Test update quiz with invalid data.
     */

    public function test_update_quiz_with_invalid_data()
    {
        // Membuat data division dengan slug unik
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1') . '-' . uniqid(),
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

        // Membuat data quiz awal dengan slug unik
        $quiz = Quiz::create([
            'title' => 'Old Quiz Title',
            'slug' => Str::slug('Old Quiz Title') . '-' . uniqid(),
            'thumbnail' => 'old-thumbnail.jpg',
            'status' => 'public',
            'code' => 'OLD123',
            'division_id' => $division->id,
        ]);

        // Data untuk update quiz dengan nilai invalid
        $invalidData = [
            'title' => '', // Title kosong
            'slug' => '', // Slug kosong
            'thumbnail' => 'invalid-thumbnail.jpg', // Thumbnail valid
            'status' => 'invalid-status', // Status tidak valid
            'code' => '', // Code kosong
            'division_id' => null, // Division ID null
        ];

        // Melakukan validasi sebelum update
        $validator = Validator::make($invalidData, [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'thumbnail' => 'nullable|string|max:255',
            'status' => 'required|in:public,private',
            'code' => 'required|string|max:50',
            'division_id' => 'required|exists:divisions,id',
        ]);

        // Pastikan validasi gagal
        $this->assertTrue($validator->fails());

        // Pastikan quiz tidak diperbarui di database
        $this->assertDatabaseHas('quizzes', [
            'title' => 'Old Quiz Title',
            'slug' => $quiz->slug, // Menggunakan slug asli
            'thumbnail' => 'old-thumbnail.jpg',
            'status' => 'public',
            'code' => 'OLD123',
            'division_id' => $division->id,
        ]);

        // Pastikan data invalid tidak tersimpan di database
        $this->assertDatabaseMissing('quizzes', [
            'title' => '',
            'slug' => '',
            'status' => 'invalid-status',
            'code' => '',
            'division_id' => null,
        ]);
    }
}
