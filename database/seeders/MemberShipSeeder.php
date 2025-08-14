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
            'name' => 'Basic Membership',
            'slug' => 'basic-membership',
            'tag' => 'basic',
             'status' => MemberShip::STATUS_ACTIVE,
            'created_by' => 1,
        ]);
        MemberShip::create([
            'name' => 'Basic Membership 2',
            'slug' => 'basic-membership-2',
            'tag' => 'basic 2',
             'status' => MemberShip::STATUS_INACTIVE,
            'created_by' => 1,
        ]);
        MemberShip::create([
            'name' => 'Basic Membership 3',
            'slug' => 'basic-membership-3',
            'tag' => 'basic 3',
             'status' => MemberShip::STATUS_ACTIVE,
            'created_by' => 1,
        ]);
    }
}
