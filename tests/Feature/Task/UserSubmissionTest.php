<?php

namespace Tests\Feature\Task;

use App\Models\Division;
use App\Models\Elearning\Task;
use App\Models\Elearning\TaskSubmission;
use App\Models\Label;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserSubmissionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * User submission task test.
     */
    public function test_it_can_create_task_submission_with_valid_data()
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

        $task = Task::create([
            'slug' => Str::slug('Task Test'),
            'name' => 'Task Test',
            'due_date' => '2024-12-31',
            'section' => 'Section 1',
            'description' => 'Deskripsi Task Test',
            'division_id' => $division->id,
        ]);
        // Create a task submission
        $taskSubmission = TaskSubmission::create([
            'submission' => 'Task submission content',
            'score' => 85,
            'grade' => 'B',
            'user_id' => $user->id,
            'task_id' => $task->id,
        ]);

        // Assert database contains the created task submission
        $this->assertDatabaseHas('task_submissions', [
            'submission' => 'Task submission content',
            'score' => 85,
            'grade' => 'B',
            'user_id' => $user->id,
            'task_id' => $task->id,
        ]);
    }


    public function test_it_should_fail_when_invalid_grade_is_provided()
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

        // Create a user
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
            'label' => 'Anggota',
            'division_id' => $division->id,
        ]);

        $task = Task::create([
            'slug' => Str::slug('Task Test'),
            'name' => 'Task Test',
            'due_date' => '2024-12-31',
            'section' => 'Section 1',
            'description' => 'Deskripsi Task Test',
            'division_id' => $division->id,
        ]);

        // Attempt to create a task submission with an invalid grade
        $this->expectException(\Illuminate\Database\QueryException::class);

        TaskSubmission::create([
            'submission' => 'Task submission content',
            'score' => 90,
            'grade' => 'F', // Invalid grade
            'user_id' => $user->id,
            'task_id' => $task->id,
        ]);
    }



    public function test_it_can_update_task_submission()
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

        // Create a user
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
            'label' => 'Anggota',
            'division_id' => $division->id,
        ]);

        $task = Task::create([
            'slug' => Str::slug('Task Test'),
            'name' => 'Task Test',
            'due_date' => '2024-12-31',
            'section' => 'Section 1',
            'description' => 'Deskripsi Task Test',
            'division_id' => $division->id,
        ]);

        // Create a task submission
        $taskSubmission = TaskSubmission::create([
            'submission' => 'Task submission content',
            'score' => 85,
            'grade' => 'B',
            'user_id' => $user->id,
            'task_id' => $task->id,
        ]);

        // Update the task submission score and grade
        $taskSubmission->update([
            'score' => 90,
            'grade' => 'A',
        ]);

        // Assert the database has the updated score and grade
        $this->assertDatabaseHas('task_submissions', [
            'score' => 90,
            'grade' => 'A',
        ]);
    }
}
