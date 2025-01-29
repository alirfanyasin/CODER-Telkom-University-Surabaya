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

class CreateQuizTest extends TestCase
{

    /**
     * Test halaman create dapat diakses.
     */
    public function test_create_quiz_page_rendered(): void
    {
        $response = $this->get(route('app.e-learning.quiz.create'));
        $response->assertStatus(302);
    }


    /**
     * Test store quiz with valid data.
     */
    public function test_store_quiz_with_valid_data()
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

        // Data untuk quiz yang akan dibuat
        $quizData = [
            'id' => rand(1, 1000),
            'title' => 'Sample Quiz',
            'slug' => Str::slug('Sample Quiz'),
            'thumbnail' => 'thumbnail.jpg',
            'status' => 'public',
            'code' => 'ABC123',
            'division_id' => $division->id,
        ];

        // Create the quiz
        $quiz = Quiz::create($quizData);

        // Periksa jika quiz berhasil disimpan di database
        $this->assertDatabaseHas('quizzes', [
            'title' => 'Sample Quiz',
            'slug' => Str::slug('Sample Quiz'),
            'thumbnail' => 'thumbnail.jpg',
            'status' => 'public',
            'code' => 'ABC123',
            'division_id' => $division->id,
        ]);
    }

    /**
     * Test store quiz with invalid data.
     */
    public function test_store_quiz_with_invalid_data()
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


        // Data untuk quiz yang invalid
        $invalidQuizData = [
            'title' => '',
            'slug' => '',
            'thumbnail' => 'thumbnail.jpg',
            'status' => 'invalid-status',
            'code' => '',
            'division_id' => $division->id,
        ];

        // Validasi data yang tidak valid menggunakan 
        $validator = Validator::make($invalidQuizData, [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'thumbnail' => 'nullable|string',
            'status' => 'required|in:public,private',
            'code' => 'required|string|max:255',
            'division_id' => 'required|exists:divisions,id',
        ]);

        // Pastikan validasi gagal
        $this->assertTrue($validator->fails());

        // Cek bahwa quiz tidak berhasil disimpan di database
        $this->assertDatabaseMissing('quizzes', [
            'title' => '',
            'slug' => '',
            'thumbnail' => 'thumbnail.jpg',
            'status' => 'invalid-status',
            'code' => '',
            'division_id' => $division->id,
        ]);
    }
}
