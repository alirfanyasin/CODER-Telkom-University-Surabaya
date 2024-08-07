<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = ArticleCategory::CATEGORY_NAME;

        foreach ($datas as $data) {
            ArticleCategory::create([
                'name' => $data
            ]);
            // dump('Article Category created ' . $data);
        }
    }
}
