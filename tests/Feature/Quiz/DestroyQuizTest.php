<?php

namespace Tests\Feature\Quiz;

use App\Models\Division;
use App\Models\Label;
use App\Models\Quiz\Quiz;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class DestroyQuizTest extends TestCase
{
    /**
     * Test destroy quiz.
     */
    public function test_destroy_quiz(): void
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
            'slug' => Str::slug('Sample Quiz') . uniqid(),
            'thumbnail' => 'thumbnail.jpg',
            'status' => 'public',
            'code' => 'ABC123',
            'division_id' => $division->id,
        ];

        // Create the quiz
        $quiz = Quiz::create($quizData);
        $this->assertDatabaseHas('quizzes', ['id' => $quiz->id]);
        $quiz->delete();
        $this->assertDatabaseMissing('quizzes', ['id' => $quiz->id]);
    }
}
