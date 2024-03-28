<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ApplicationSeeder::class,
            DeviceTypeSeeder::class,
            InletSeeder::class,
            InletChooseSeeder::class,
            OutletSeeder::class,
            OutletChooseSeeder::class,
            ChooseSeeder::class,
            ClassRatingSeeder::class,
            BodyMaterialSeeder::class,
            BodyManufacturerSeeder::class,
            ValveConditionSubjectSeeder::class,
            CriticalityLevelSeeder::class,
            HealthRatingSeeder::class,
            ValveConditionOptionSeeder::class,
            PotensialCauseOptionSeeder::class,
            RecommendationOptionSeeder::class,
            PriorityRatingSeeder::class,
            PriorityMatrixSeeder::class,
            NamePlateSeeder::class,
            EndConnectionSeeder::class,
            LeakageclassSeeder::class,
            LocationSeeder::class,
            // UserSeeder::class,
            EmployeeSeeder::class
        ]);
    }
}
