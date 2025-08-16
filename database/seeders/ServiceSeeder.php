<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Services;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
   {
       Services::create([
           'title' => 'TRAVEL',
           'sub_title' => 'get free consultation',
           'status' => Services::STATUS_ACTIVE
       ]);
       Services::create([
           'title' => 'DINING',
           'sub_title' => 'lorem ipsum dolor sit amet',
           'status' => Services::STATUS_ACTIVE
       ]);
       Services::create([
           'title' => 'COMPANIONSHIP',
           'sub_title' => 'build modern web applications',
           'status' => Services::STATUS_ACTIVE
       ]);
       Services::create([
           'title' => 'PROPERTY ACCESS',
           'sub_title' => 'create stunning visuals',
           'status' => Services::STATUS_ACTIVE
       ]);
       Services::create([
           'title' => 'EVENTS',
           'sub_title' => 'get free consultation',
           'status' => Services::STATUS_ACTIVE
       ]);
    }
}