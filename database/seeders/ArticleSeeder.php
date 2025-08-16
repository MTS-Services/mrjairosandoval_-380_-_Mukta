<?php
namespace Database\Seeders;

use App\Models\Articles;
use App\Models\ArticleCategory;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Get the existing categories
        $technologyCategory = ArticleCategory::firstOrCreate([
            'slug' => 'technology',
            'name' => 'Technology'
        ]);

        $healthCategory = ArticleCategory::firstOrCreate([
            'slug' => 'health',
            'name' => 'Health'
        ]);

        // Seed articles with category_id from the ArticleCategory model
        Articles::create([
            'title' => 'consultation1',
            'category_id' => $technologyCategory->id, // Using the correct category ID
            'sub_title' => 'get free consultation',
            'slug' => 'get',
            'content' => 'lorem ipsum dolor sit amet',
            'auther_name' => 'admin',
            'published_data' => now(),
            'read_time' => 10,
            'views' => 100,
            'meta_title' => 'meta title',
            'meta_description' => 'meta description',
            'meta_keywords' => 'meta keywords',
            'image' => 'article.jpg',
        ]);

        Articles::create([
            'title' => 'consultation2',
            'category_id' => $healthCategory->id, // Using the correct category ID
            'sub_title' => 'get free consultation test',
            'slug' => 'get free',
            'content' => 'lorem ipsum dolor sit amet test',
            'auther_name' => 'admin1',
            'published_data' => now(),
            'read_time' => 11,
            'views' => 1100,
            'meta_title' => 'meta title version 2',
            'meta_description' => 'meta description here',
            'meta_keywords' => 'meta keywords go here',
            'image' => 'article2.jpg',
        ]);
    }
}
