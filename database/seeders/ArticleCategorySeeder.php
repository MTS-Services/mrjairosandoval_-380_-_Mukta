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
        $categories = [
            [

                'name' => 'Philosophy',
                'slug' => 'philosophy',
                'status' => ArticleCategory::STATUS_ACTIVE,
            ],

            [

                'name' => 'Hidden Histories',
                'slug' => 'hidden-histories',
                'status' => ArticleCategory::STATUS_ACTIVE,
            ],

            [

                'name' => 'Observations',
                'slug' => 'observations',
                'status' => ArticleCategory::STATUS_ACTIVE,
            ],
        ];

        foreach ($categories as $category) {
            ArticleCategory::updateOrCreate(
                ['slug' => $category['slug']], // prevent duplicates
                $category
            );
        }
    }
}
