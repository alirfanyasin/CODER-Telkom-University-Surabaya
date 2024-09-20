<?php

namespace Database\Seeders;

use App\Models\ActivityLetter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'reference_number' => null,
            'date_published' => null,
            'length_of_service' => null,
            'leaders_name' => null,
            'nim' => null
        ];

        ActivityLetter::create($data);
    }
}
