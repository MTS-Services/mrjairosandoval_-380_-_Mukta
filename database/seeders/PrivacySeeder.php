<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;



use App\Models\PrivacyPolicie;
use Illuminate\Database\Seeder;


class PrivacySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
   {
       PrivacyPolicie::create([
        'type' => 'open',
        'notes' => 'some notes',
          'status' => PrivacyPolicie::STATUS_ACTIVE,
       
       ]);
       PrivacyPolicie::create([
        'type' => 'close',
        'notes' => 'some notes',
        'status' => PrivacyPolicie::STATUS_ACTIVE,
       ]);
     
      
    }
}