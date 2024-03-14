<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\CriticalityLevel;
use App\Models\SiteWalkDown\HealthRating;
use App\Models\SiteWalkDown\PriorityMatrix;
use App\Models\SiteWalkDown\PriorityRating;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PriorityMatrixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criticalityLevels = CriticalityLevel::select('id','title')->get();
        $criticalityLevel = collect();
        foreach ($criticalityLevels as $value) {
            $criticalityLevel->put($value->id, $value->title);
        }

        $healthRatings = HealthRating::select('id','title')->get();
        $healthRating = collect();
        foreach ($healthRatings as $value) {
            $healthRating->put($value->id, $value->title);
        }

        $priorityRatings = PriorityRating::select('id','level')->get();
        $priorityRating = collect();
        foreach ($priorityRatings as $value) {
            $priorityRating->put($value->id, $value->level);
        }

        PriorityMatrix::insert([
            [
                'criticality_level_id' => $criticalityLevel->search('High'), 'health_rating_id' => $healthRating->search('Good'),
                'priority_rating_id' => $priorityRating->search(2),
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'criticality_level_id' => $criticalityLevel->search('High'), 'health_rating_id' => $healthRating->search('Fair'),
                'priority_rating_id' => $priorityRating->search(3),
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'criticality_level_id' => $criticalityLevel->search('High'), 'health_rating_id' => $healthRating->search('Poor'),
                'priority_rating_id' => $priorityRating->search(3),
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'criticality_level_id' => $criticalityLevel->search('Moderate'), 'health_rating_id' => $healthRating->search('Good'),
                'priority_rating_id' => $priorityRating->search(1),
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'criticality_level_id' => $criticalityLevel->search('Moderate'), 'health_rating_id' => $healthRating->search('Fair'),
                'priority_rating_id' => $priorityRating->search(2),
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'criticality_level_id' => $criticalityLevel->search('Moderate'), 'health_rating_id' => $healthRating->search('Poor'),
                'priority_rating_id' => $priorityRating->search(3),
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'criticality_level_id' => $criticalityLevel->search('Low'), 'health_rating_id' => $healthRating->search('Good'),
                'priority_rating_id' => $priorityRating->search(1),
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'criticality_level_id' => $criticalityLevel->search('Low'), 'health_rating_id' => $healthRating->search('Fair'),
                'priority_rating_id' => $priorityRating->search(1),
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            [
                'criticality_level_id' => $criticalityLevel->search('Low'), 'health_rating_id' => $healthRating->search('Poor'),
                'priority_rating_id' => $priorityRating->search(2),
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
