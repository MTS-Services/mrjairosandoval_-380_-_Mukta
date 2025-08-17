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

        // Seed articles with category_id from the ArticleCategory model
        Articles::create([
            'title' => 'The Art of Elegant Disappearance',
            'category_id' => 1, // Using the correct category ID
            'sub_title' => 'In a world obsessed with presence, the most powerful move is knowing when to vanish. The art lies not in the exit, but in the silence that follows.',
            'slug' => 'get',
            'content' => 'lorem ipsum dolor sit amet',
            'auther_name' => 'admin',
            'published_data' => now(),
            'status' => Articles::STATUS_ACTIVE,
            'read_time' => 10,
            'views' => 100,
            'meta_title' => 'meta title',
            'meta_description' => 'meta description',
            'meta_keywords' => 'meta keywords',
            'image' => 'article.jpg',
        ]);

        Articles::create([
            'title' => 'Generational Wealth & Secret Traditions',
            'category_id' => 2, // Using the correct category ID
            'sub_title' => 'True wealth isn’t counted in currency but in customs. The families that endure understand that some traditions are too valuable to share.',
            'slug' => 'get free',
            'content' => 'lorem ipsum dolor sit amet test',
            'auther_name' => 'admin1',
            'published_data' => now(),
            'status' => Articles::STATUS_ACTIVE,
            'read_time' => 11,
            'views' => 1100,
            'meta_title' => 'meta title version 2',
            'meta_description' => 'meta description here',
            'meta_keywords' => 'meta keywords go here',
            'image' => 'article2.jpg',
        ]);
        Articles::create([
            'title' => 'Taste: When to Refuse',
            'category_id' => 3, // Using the correct category ID
            'sub_title' => 'The highest form of taste is not in what you choose to accept, but in what you have the wisdom to decline. Refusal is the ultimate luxury.',
            'slug' => 'taste-when-to-refuse',
            'content' => 'lorem ipsum dolor sit amet',
            'auther_name' => 'admin2',
            'published_data' => now(),
            'read_time' => 12,
            'status' => Articles::STATUS_ACTIVE,
            'views' => 1200,
            'meta_title' => 'meta title version 3',
            'meta_description' => 'meta description here',
            'meta_keywords' => 'meta keywords go here',
            'image' => 'article3.jpg',
        ]);
    }
}
