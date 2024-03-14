<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\HealthRating;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HealthRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HealthRating::insert([
            ['title' => 'Good', 'level' => 1, 'created_at' => Carbon::now()],
            ['title' => 'Fair', 'level' => 2, 'created_at' => Carbon::now()],
            ['title' => 'Poor', 'level' => 3, 'created_at' => Carbon::now()]
        ]);
    }
}
