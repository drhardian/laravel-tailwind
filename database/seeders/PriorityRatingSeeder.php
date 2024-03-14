<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\PriorityRating;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PriorityRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
            Priority Levels:
            1 => Low Priority => #069301 (green)
            2 => Moderate Priority => #FFEB2A (yellow)
            3 => High Priority => #EF0307 (red)
        */

        PriorityRating::insert([
            [ 'title' => 'Low Priority', 'color' => '#069301', 'level' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'Moderate Priority', 'color' => '#FFEB2A', 'level' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => 'High Priority', 'color' => '#EF0307', 'level' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);
    }
}
