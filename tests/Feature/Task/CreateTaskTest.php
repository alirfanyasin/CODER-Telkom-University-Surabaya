<?php

namespace Tests\Feature\Task;

use App\Models\Division;
use App\Models\Elearning\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test halaman create dapat diakses.
     */

    public function test_create_task_page_rendered(): void
    {
        $response = $this->get(route('app.e-learning.task.create'));
        $response->assertStatus(302);
    }

    /**
     * Test create task with valid data.
     */
    public function test_create_task_with_valid_data(): void
    {
        // Membuat data division
        $division = Division::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1') . uniqid(),
            'description' => 'Deskripsi Division 1',
            'logo' => 'logo.png',
        ]);

        // Data task untuk diuji
        $taskData = [
            'name' => 'Task Test',
            'due_date' => '2024-12-31',
            'section' => 'Section 1',
            'description' => 'Deskripsi Task Test',
            'division_id' => $division->id,
        ];

        $task = Task::create($taskData);
        $this->assertDatabaseHas('tasks', $taskData);
        $this->assertEquals($taskData['name'], $task->name);
        $this->assertEquals($taskData['due_date'], $task->due_date);
        $this->assertEquals($taskData['section'], $task->section);
        $this->assertEquals($taskData['description'], $task->description);
        $this->assertEquals($taskData['division_id'], $task->division_id);
    }
}
