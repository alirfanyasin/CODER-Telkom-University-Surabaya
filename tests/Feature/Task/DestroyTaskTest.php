<?php

namespace Tests\Feature\Task;

use App\Models\Division;
use App\Models\Elearning\Task;
use App\Models\Label;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class DestroyTaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test destroy task.
     */
    public function test_destroy_task(): void
    {
        // Membuat data division awal
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


        // Membuat task awal
        $task = Task::create([
            'slug' => Str::slug('Task Awal'),
            'name' => 'Task Awal',
            'due_date' => '2024-12-30',
            'section' => 'Section Awal',
            'description' => 'Deskripsi Task Awal',
            'division_id' => $division->id,
        ]);

        $this->assertDatabaseHas('tasks', ['id' => $task->id]);
        $task->delete();
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
