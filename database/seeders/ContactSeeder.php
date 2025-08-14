<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Contact;
use Illuminate\Database\Seeder;


class ContactSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
   {
       Contact::create([
        'name' => 'test 1',
        'email' => 'test@dev.com',
        'introducer' => ' referal',
        'patience' => ' example patience',
       ]);
       Contact::create([
        'name' => 'test 2',
        'email' => 'test2@dev.com',
        'introducer' => ' referal from test 1',
        'patience' => ' example patience below',
       
          
       ]);
       Contact::create([
      
        'name' => 'test 3',
        'email' => 'test3@dev.com',
        'introducer' => ' referal up from test 2',
        'patience' => ' example patience continue',
           
       ]);
      
    }
}