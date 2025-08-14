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
           'title' => 'consultation',
           'sub_title' => 'get free consultation',
           
       ]);
       Services::create([
           'title' => 'example',
           'sub_title' => 'lorem ipsum dolor sit amet',
           
       ]);
    }
}