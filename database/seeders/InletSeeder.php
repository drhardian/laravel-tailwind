<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\Dropdown;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dropdown::insert([
            [ 'title' => 'Flange', 'alias' => 'VLVINL', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'Screw ', 'alias' => 'VLVINL', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'Other', 'alias' => 'VLVINL', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);
    }
}
