<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\LocationDetail;
use App\Models\SiteWalkDown\LocationType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LocationType::insert([
            [ 'title' => 'Field', 'created_at' => Carbon::now() ],
            [ 'title' => 'Non-Field', 'created_at' => Carbon::now() ],
        ]);

        $locationType = LocationType::select('id','title')->get();

        foreach ($locationType as $location) {
            if($location->title == 'Non-Field') {
                LocationDetail::insert([
                    [
                        'location_type_id' => $location->id,
                        'title' => 'Marunda',
                        'created_at' => Carbon::now()
                    ],
                    [
                        'location_type_id' => $location->id,
                        'title' => 'PTCS Workshop',
                        'created_at' => Carbon::now()
                    ],
                ]);
            }
        }
    }
}
