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

class UpdateTaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test halaman create dapat diakses.
     */

    public function test_edit_task_page_rendered(): void
    {
        $response = $this->get(route('app.e-learning.task.edit', ['slug' => 'hello-world']));
        $response->assertStatus(302);
    }


    /**
     * Test update task with valid data.
     */
    public function test_update_task_with_valid_data(): void
    {
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

        $task = Task::create([
            'slug' => Str::slug('Task Awal'),
            'name' => 'Task Awal',
            'due_date' => '2024-12-30',
            'section' => 'Section Awal',
            'description' => 'Deskripsi Task Awal',
            'division_id' => $division->id,
        ]);

        $updateData = [
            'slug' => Str::slug('Task Update'),
            'name' => 'Task Update',
            'due_date' => '2024-12-31',
            'section' => 'Section Update',
            'description' => 'Deskripsi Task Update',
            'division_id' => $division->id,
        ];

        $task->update($updateData);

        $this->assertDatabaseHas('tasks', $updateData);

        $this->assertEquals($updateData['name'], $task->name);
        $this->assertEquals($updateData['slug'], $task->slug);
        $this->assertEquals($updateData['due_date'], $task->due_date);
        $this->assertEquals($updateData['section'], $task->section);
        $this->assertEquals($updateData['description'], $task->description);
        $this->assertEquals($updateData['division_id'], $task->division_id);
    }
}
