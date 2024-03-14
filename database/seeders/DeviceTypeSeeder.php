<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\DeviceType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeviceType::insert([
            [ 'initial' => 'COV', 'title' => 'Control Valve', 'created_at' => Carbon::now() ],
            [ 'initial' => 'REG', 'title' => 'Regulator', 'created_at' => Carbon::now() ],
            [ 'initial' => 'CKV', 'title' => 'Check Valve', 'created_at' => Carbon::now() ],
            [ 'initial' => 'ISV', 'title' => 'Isolation Valve', 'created_at' => Carbon::now() ],
            [ 'initial' => 'PRV', 'title' => 'Pressure Relief Valve', 'created_at' => Carbon::now() ],
            [ 'initial' => 'MAV', 'title' => 'Manual Valve', 'created_at' => Carbon::now() ],
            [ 'initial' => 'TNK', 'title' => 'Tank', 'created_at' => Carbon::now() ],
        ]);
    }
}
