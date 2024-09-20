<?php

namespace Database\Seeders;

use App\Models\Points;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'Pertemuan',
                'points' => 2,
                'times' => 20
            ],
            [
                'name' => 'Tugas',
                'points' => 5,
                'times' => 12
            ],
            [
                'name' => 'Kuis',
                'points' => 5,
                'times' => 4
            ],
            [
                'name' => 'Final Project',
                'points' => 10,
                'times' => 1
            ],
            [
                'name' => 'Kepanitiaan',
                'points' => 15,
                'times' => 0
            ],
            [
                'name' => 'Minimal Poin',
                'points' => 100,
                'times' => 0
            ],
        ];

        foreach ($datas as $data) {
            Points::create($data);
        }
    }
}
