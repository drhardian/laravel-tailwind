<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\Dropdown;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClassRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dropdown::insert([
            [ 'title' => '150', 'alias' => 'CLSRTG', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => '300', 'alias' => 'CLSRTG', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => '600', 'alias' => 'CLSRTG', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => '900', 'alias' => 'CLSRTG', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => '1500', 'alias' => 'CLSRTG', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => '2500', 'alias' => 'CLSRTG', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);
    }
}
