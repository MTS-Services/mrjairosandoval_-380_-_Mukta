<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::create([
            'name' => '24/7 Shadow Concierge',
            'status' => Feature::STATUS_ACTIVE,
        ]);

        Feature::create([
            'name' => 'Use of Medici Villas',
            'status' => Feature::STATUS_ACTIVE,
        ]);

        Feature::create([
            'name' => 'Black Book Access',
            'status' => Feature::STATUS_ACTIVE,
        ]);
    }
}
