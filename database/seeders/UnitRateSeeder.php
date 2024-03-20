<?php

namespace Database\Seeders;

use App\Models\RequestOrder\UnitRate;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnitRate::insert([
            [
                'rate_name' => 'General',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'rate_name' => 'Daily Rate',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'rate_name' => 'Standby Rate',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'rate_name' => 'Inspection',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'rate_name' => 'Minor Repair',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'rate_name' => 'Major Repair',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'rate_name' => 'Painting Testing & Packaging',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
