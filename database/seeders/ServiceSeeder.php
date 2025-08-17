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
           'sort_order' => 0,
           'title' => 'TRAVEL',
           'sub_title' => 'Private jets, untraceable.',
           'status' => Services::STATUS_ACTIVE
       ]);
       Services::create([
           'sort_order' => 1,
           'title' => 'DINING',
           'sub_title' => 'Custom tasting menus without limits.',
           'status' => Services::STATUS_ACTIVE
       ]);
       Services::create([
           'sort_order' => 2,
           'title' => 'COMPANIONSHIP',
           'sub_title' => 'Discreet, refined, unforgettable.',
           'status' => Services::STATUS_ACTIVE
       ]);
       Services::create([
           'sort_order' => 3,
           'title' => 'PROPERTY ACCESS',
           'sub_title' => 'Historic villas, secret estates.',
           'status' => Services::STATUS_ACTIVE
       ]);
       Services::create([
           'sort_order' => 4,
           'title' => 'EVENTS',
           'sub_title' => 'Masked affairs, tailored rituals.',
           'status' => Services::STATUS_ACTIVE
       ]);
    }
}