<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'slug' => Str::slug('pertemuan-1-tugas-1'),
                'name' => 'Fundamental HTML dan CSS Dasar',
                'due_date' => now()->addDays(3),
                'section' => 'Pertemuan 1',
                'description' => 'Mengenal fundamental HTML dan CSS untuk pemula',
                'file_name' => null,
                'division_id' => 1,
            ],
            [
                'slug' => Str::slug('pertemuan-1-tugas-2'),
                'name' => 'Fundamental JavaScript Dasar',
                'due_date' => now()->addDays(3),
                'section' => 'Pertemuan 1',
                'description' => 'Mengenal fundamental JavaScript untuk pemula',
                'file_name' => null,
                'division_id' => 1,
            ],
            [
                'slug' => Str::slug('pertemuan-2-tugas-1'),
                'name' => 'Fundamental PHP Dasar',
                'due_date' => now()->addDays(3),
                'section' => 'Pertemuan 2',
                'description' => 'Mengenal fundamental PHP untuk pemula',
                'file_name' => null,
                'division_id' => 1,
            ],
            [
                'slug' => Str::slug('pertemuan-2-tugas-2'),
                'name' => 'Fundamental Laravel Dasar',
                'due_date' => now()->addDays(3),
                'section' => 'Pertemuan 2',
                'description' => 'Mengenal fundamental Laravel untuk pemula',
                'file_name' => null,
                'division_id' => 1,
            ],
            [
                'slug' => Str::slug('pertemuan-2-tugas-3'),
                'name' => 'Fundamental Vue.js Dasar',
                'due_date' => now()->addDays(3),
                'section' => 'Pertemuan 2',
                'description' => 'Mengenal fundamental Vue.js untuk pemula',
                'file_name' => null,
                'division_id' => 1,
            ],
            [
                'slug' => Str::slug('pertemuan-3-tugas-1'),
                'name' => 'Fundamental React.js Dasar',
                'due_date' => now()->addDays(3),
                'section' => 'Pertemuan 3',
                'description' => 'Mengenal fundamental React.js untuk pemula',
                'file_name' => null,
                'division_id' => 1,
            ],
            [
                'slug' => Str::slug('pertemuan-3-tugas-2'),
                'name' => 'Fundamental Node.js Dasar',
                'due_date' => now()->addDays(3),
                'section' => 'Pertemuan 3',
                'description' => 'Mengenal fundamental Node.js untuk pemula',
                'file_name' => null,
                'division_id' => 1,
            ]
        ];

        foreach ($tasks as $task) {
            Task::create($task);
            dump('Task created: ' . $task['name']);
        }
    }
}
