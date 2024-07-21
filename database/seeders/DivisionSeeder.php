<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = Division::DIVISION_NAMES;
        $descriptions = Division::DESCRIPTIONS;
        $icons = Division::ICONS;

        foreach ($names as $index => $name) {
            Division::create([
                'slug' => Str::slug($name),
                'name' => $name,
                'description' => $descriptions[$index],
                'logo' => $icons[$index],
            ]);
            dump('Division created: ' . $name);
        }
    }
}
