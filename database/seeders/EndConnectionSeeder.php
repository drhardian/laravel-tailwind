<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\Dropdown;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EndConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dropdown::insert([
            [ 'title' => 'BWE', 'alias' => 'ENDCON', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'Double Flange', 'alias' => 'ENDCON', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'FF', 'alias' => 'ENDCON', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'Lugged', 'alias' => 'ENDCON', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'RF', 'alias' => 'ENDCON', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'Single Flange', 'alias' => 'ENDCON', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'SWE', 'alias' => 'ENDCON', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'Threaded', 'alias' => 'ENDCON', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'Wafer', 'alias' => 'ENDCON', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);
    }
}
