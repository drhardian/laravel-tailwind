<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\Dropdown;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OutletChooseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dropdown::insert([
            [ 'title' => 'GPM', 'alias' => 'OULCHE', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'PPH', 'alias' => 'OULCHE', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'SCFM', 'alias' => 'OULCHE', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);
    }
}
