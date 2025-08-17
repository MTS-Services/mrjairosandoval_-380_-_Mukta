<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Banner;

use Illuminate\Database\Seeder;


class BannerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
   {
       Banner::create([
           'title' => 'CERTAIN DOORS DON’T APPEAR
UNTIL YOU’RE READY TO KNOCK.',
           'image' => 'banners/1.jpg',
           'status' => Banner::STATUS_ACTIVE
       ]);
       Banner::create([
           'title' => 'DINING',
           'image' => 'banners/2.jpg',
           'status' => Banner::STATUS_INACTIVE
       ]);
       Banner::create([
           'title' => 'COMPANIONSHIP',
           'image' => 'banners/3.jpg',
           'status' => Banner::STATUS_INACTIVE
       ]);
      
    }
}