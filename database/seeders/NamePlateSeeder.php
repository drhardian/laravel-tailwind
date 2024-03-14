<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\Dropdown;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NamePlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dropdown::insert([
            [ 'title' => 'Corroded', 'alias' => 'NMEPLT', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'Good', 'alias' => 'NMEPLT', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'Missing', 'alias' => 'NMEPLT', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'Unclear', 'alias' => 'NMEPLT', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);
    }
}
