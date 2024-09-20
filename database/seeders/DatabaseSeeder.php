<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call(RolePermissionSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(UserRolePermissionSeeder::class);
        $this->call(ArticleCategorySeeder::class);
        $this->call(PointsSeeder::class);
        // $this->call(TaskSeeder::class);
        $this->call(ActivityLetterSeeder::class);
    }
}
