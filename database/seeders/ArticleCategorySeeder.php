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
    
                'name' => 'Technology',
                'slug' => 'technology',
                'status' => ArticleCategory::STATUS_ACTIVE,
            ],
            [
                
                'name' => 'Health',
                'slug' => 'health',
                'status' => ArticleCategory::STATUS_ACTIVE,
            ],
            [
               
                'name' => 'Business',
                'slug' => 'business',
                'status' => ArticleCategory::STATUS_ACTIVE,
            ],
            [
                
                'name' => 'Lifestyle',
                'slug' => 'lifestyle',
                'status' => ArticleCategory::STATUS_INACTIVE,
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
