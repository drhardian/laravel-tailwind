<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\Dropdown;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeakageclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dropdown::insert([
            [ 'title' => 'I', 'alias' => 'LKGCLS', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'II', 'alias' => 'LKGCLS', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'III', 'alias' => 'LKGCLS', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'IV', 'alias' => 'LKGCLS', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'V', 'alias' => 'LKGCLS', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'VI', 'alias' => 'LKGCLS', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'TSO', 'alias' => 'LKGCLS', 'device_type' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);
    }
}
