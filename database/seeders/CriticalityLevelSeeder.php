<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\CriticalityLevel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriticalityLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CriticalityLevel::insert([
            ['title' => 'High', 'created_at' => Carbon::now()],
            ['title' => 'Moderate', 'created_at' => Carbon::now()],
            ['title' => 'Low', 'created_at' => Carbon::now()]
        ]);
    }
}
