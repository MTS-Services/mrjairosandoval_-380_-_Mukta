<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\User;
use App\Services\Admin\Service\Service;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
   {
        $this->call([

            AdminSeeder::class,
            UserSeeder::class,
            ServiceSeeder::class,
            ArticleSeeder::class,
            BannerSeeder::class,
            FeatureSeeder::class,
            MemberShipSeeder::class,
            ContactSeeder::class,

        ]);
    }
}
