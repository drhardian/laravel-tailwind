<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\Dropdown;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ChooseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # PRV
        Dropdown::insert([
            [ 'title' => 'GPM', 'alias' => 'VLVCHE', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'PPH', 'alias' => 'VLVCHE', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'SCFM', 'alias' => 'VLVCHE', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);
    }
}
