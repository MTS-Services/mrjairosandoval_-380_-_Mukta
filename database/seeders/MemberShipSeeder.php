<?php

namespace Database\Seeders;

use App\Models\MemberShip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberShipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemberShip::create([
            'name' => 'Priority access',
            'slug' => 'priority-access',
             'status' => MemberShip::STATUS_ACTIVE,
        ]);
        MemberShip::create([
            'name' => 'Cavalieri Premier',
            'slug' => 'cavalieri-premier',
            'tag' => 'Premier',
             'status' => MemberShip::STATUS_ACTIVE,
        ]);
        MemberShip::create([
            'name' => 'Cavalieri Ottimale',
            'slug' => 'cavalieri-ottimale',
            'tag' => 'Premierr',
             'status' => MemberShip::STATUS_ACTIVE,
        ]);
    }
}
