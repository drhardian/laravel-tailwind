<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\DeviceType;
use App\Models\SiteWalkDown\HealthRating;
use App\Models\SiteWalkDown\ValveConditionOption;
use App\Models\SiteWalkDown\ValveConditionSubject;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ValveConditionOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Get device types & convert it into collection */
        $deviceTypes = DeviceType::select('id','initial')->get();
        $deviceType = collect();
        foreach ($deviceTypes as $value) {
            $deviceType->put($value->id, $value->initial);
        }

        /* Get health rating (Good, Fair, Poor) & convert it into collection */
        $healthRatings = HealthRating::select('id','title')->get();
        $healthRating = collect();
        foreach ($healthRatings as $value) {
            $healthRating->put($value->id, $value->title);
        }

        /* Control Valve assessment subject - options for valve condition */
        /* insert options for Packing */
        $covValveCond_options_AS1 = [
            ['id' => 'AS1', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Damaged'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Leak'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Material Incompatibility'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Packing Flange/Gland Torque'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($covValveCond_options_AS1 as $covValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $covValveCond_option['deviceType']],
                    ['code', '=', $covValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $covValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $covValveCond_option['healthRating'],
                'title' => $covValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Bonnet */
        $covValveCond_options_AS2 = [
            ['id' => 'AS2', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Eroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
        ];
        foreach ($covValveCond_options_AS2 as $covValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $covValveCond_option['deviceType']],
                    ['code', '=', $covValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $covValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $covValveCond_option['healthRating'],
                'title' => $covValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Bonnet Gasket */
        $covValveCond_options_AS3 = [
            ['id' => 'AS3', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bolt Torque'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Material Compatibility'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($covValveCond_options_AS3 as $covValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $covValveCond_option['deviceType']],
                    ['code', '=', $covValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $covValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $covValveCond_option['healthRating'],
                'title' => $covValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Valve Body */
        $covValveCond_options_AS4 = [
            ['id' => 'AS4', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Cracked'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Eroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Eroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'High Cycling/Hard to Control'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Vibration'],
        ];
        foreach ($covValveCond_options_AS4 as $covValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $covValveCond_option['deviceType']],
                    ['code', '=', $covValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $covValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $covValveCond_option['healthRating'],
                'title' => $covValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Valve Trim */
        $covValveCond_options_AS5 = [
            ['id' => 'AS5', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bent Stem'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Eroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Galled'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Pitted'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($covValveCond_options_AS5 as $covValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $covValveCond_option['deviceType']],
                    ['code', '=', $covValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $covValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $covValveCond_option['healthRating'],
                'title' => $covValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Body Bolts & Nuts */
        $covValveCond_options_AS6 = [
            ['id' => 'AS6', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Loose'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Worn'],
        ];
        foreach ($covValveCond_options_AS6 as $covValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $covValveCond_option['deviceType']],
                    ['code', '=', $covValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $covValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $covValveCond_option['healthRating'],
                'title' => $covValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Actuator External Condition */
        $covValveCond_options_AS7 = [
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bent'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Eroded'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Galled'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Over Thrust/Torque'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Over Voltage'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Oversize'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Pitted'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Undersize'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Vibration'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Wet/Dirty Instrument Air'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($covValveCond_options_AS7 as $covValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $covValveCond_option['deviceType']],
                    ['code', '=', $covValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $covValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $covValveCond_option['healthRating'],
                'title' => $covValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Electrical Enclosure */
        $covValveCond_options_AS8 = [
            ['id' => 'AS8', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Cracked'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Temperature Capability'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Water Ingress'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($covValveCond_options_AS8 as $covValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $covValveCond_option['deviceType']],
                    ['code', '=', $covValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $covValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $covValveCond_option['healthRating'],
                'title' => $covValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Seals */
        $covValveCond_options_AS9 = [
            ['id' => 'AS9', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS9', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS9', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Missing'],
            ['id' => 'AS9', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Pinched'],
            ['id' => 'AS9', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
        ];
        foreach ($covValveCond_options_AS9 as $covValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $covValveCond_option['deviceType']],
                    ['code', '=', $covValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $covValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $covValveCond_option['healthRating'],
                'title' => $covValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Gear Box */
        $covValveCond_options_AS10 = [
            ['id' => 'AS10', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bent'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Dry Lubricant'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Eroded'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Galled'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Pitted'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
        ];
        foreach ($covValveCond_options_AS10 as $covValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $covValveCond_option['deviceType']],
                    ['code', '=', $covValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $covValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $covValveCond_option['healthRating'],
                'title' => $covValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Manual Override */
        $covValveCond_options_AS11 = [
            ['id' => 'AS11', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Bent'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Damaged'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Dry Lubricant'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
        ];
        foreach ($covValveCond_options_AS11 as $covValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $covValveCond_option['deviceType']],
                    ['code', '=', $covValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $covValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $covValveCond_option['healthRating'],
                'title' => $covValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Positioner & Accessories */
        $covValveCond_options_AS12 = [
            ['id' => 'AS12', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Corroded'],
            ['id' => 'AS12', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Damaged'],
            ['id' => 'AS12', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS12', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Missing'],
            ['id' => 'AS12', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Out of Calibration'],
            ['id' => 'AS12', 'deviceType' => $deviceType->search('COV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
        ];
        foreach ($covValveCond_options_AS12 as $covValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $covValveCond_option['deviceType']],
                    ['code', '=', $covValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $covValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $covValveCond_option['healthRating'],
                'title' => $covValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }

        /* Regulator assessment subject - options for valve condition */
        /* insert options for Body/Base */
        $regValveCond_options_AS1 = [
            ['id' => 'AS1', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Cracked'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Galled'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Out of Calibration'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Pitted'],
        ];
        foreach ($regValveCond_options_AS1 as $regValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $regValveCond_option['deviceType']],
                    ['code', '=', $regValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $regValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $regValveCond_option['healthRating'],
                'title' => $regValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Body Bolts & Nuts */
        $regValveCond_options_AS2 = [
            ['id' => 'AS2', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Loose'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Worn'],
        ];
        foreach ($regValveCond_options_AS2 as $regValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $regValveCond_option['deviceType']],
                    ['code', '=', $regValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $regValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $regValveCond_option['healthRating'],
                'title' => $regValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Bonnet */
        $regValveCond_options_AS3 = [
            ['id' => 'AS3', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Galled'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Pitted'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Spindle Bent'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Spring Damaged'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Unsealed'],
        ];
        foreach ($regValveCond_options_AS3 as $regValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $regValveCond_option['deviceType']],
                    ['code', '=', $regValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $regValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $regValveCond_option['healthRating'],
                'title' => $regValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Pilot */
        $regValveCond_options_AS4 = [
            ['id' => 'AS4', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Galled'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Out of Calibration'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Pitted'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Spring Damaged'],
        ];
        foreach ($regValveCond_options_AS4 as $regValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $regValveCond_option['deviceType']],
                    ['code', '=', $regValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $regValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $regValveCond_option['healthRating'],
                'title' => $regValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Manual Override */
        $regValveCond_options_AS5 = [
            ['id' => 'AS5', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Bent'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Damaged'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Dry Lubricant'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('REG'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
        ];
        foreach ($regValveCond_options_AS5 as $regValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $regValveCond_option['deviceType']],
                    ['code', '=', $regValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $regValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $regValveCond_option['healthRating'],
                'title' => $regValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }

        /* Check Valve assessment subject - options for valve condition */
        /* insert options for Packing */
        $ckvValveCond_options_AS1 = [
            ['id' => 'AS1', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Damaged'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Leak'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Material Incompatibility'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Packing Flange/Gland Torque'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Worn'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($ckvValveCond_options_AS1 as $ckvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $ckvValveCond_option['deviceType']],
                    ['code', '=', $ckvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $ckvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $ckvValveCond_option['healthRating'],
                'title' => $ckvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Body Bolts & Nuts */
        $ckvValveCond_options_AS2 = [
            ['id' => 'AS2', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Loose'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Worn'],
        ];
        foreach ($ckvValveCond_options_AS2 as $ckvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $ckvValveCond_option['deviceType']],
                    ['code', '=', $ckvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $ckvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $ckvValveCond_option['healthRating'],
                'title' => $ckvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Pressure Seal Gasket Area */
        $ckvValveCond_options_AS3 = [
            ['id' => 'AS3', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bolt Torque'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Eroded'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Galled'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Pitted'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Worn'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($ckvValveCond_options_AS3 as $ckvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $ckvValveCond_option['deviceType']],
                    ['code', '=', $ckvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $ckvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $ckvValveCond_option['healthRating'],
                'title' => $ckvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Bonnet Gasket */
        $ckvValveCond_options_AS4 = [
            ['id' => 'AS4', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bolt Torque'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Eroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Galled'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Pitted'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Worn'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($ckvValveCond_options_AS4 as $ckvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $ckvValveCond_option['deviceType']],
                    ['code', '=', $ckvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $ckvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $ckvValveCond_option['healthRating'],
                'title' => $ckvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Manual Override */
        $ckvValveCond_options_AS5 = [
            ['id' => 'AS5', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Bent'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Damaged'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Dry Lubricant'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('CKV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Worn'],
        ];
        foreach ($ckvValveCond_options_AS5 as $ckvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $ckvValveCond_option['deviceType']],
                    ['code', '=', $ckvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $ckvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $ckvValveCond_option['healthRating'],
                'title' => $ckvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }

        /* Isolation Valve assessment subject - options for valve condition */
        /* insert options for Packing */
        $isvValveCond_options_AS1 = [
            ['id' => 'AS1', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Damaged'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Leak'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Material Incompatibility'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Packing Flange/Gland Torque'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($isvValveCond_options_AS1 as $isvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $isvValveCond_option['deviceType']],
                    ['code', '=', $isvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $isvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $isvValveCond_option['healthRating'],
                'title' => $isvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Pressure Seal Gasket Area */
        $isvValveCond_options_AS2 = [
            ['id' => 'AS2', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bolt Torque'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Eroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Galled'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Pitted'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($isvValveCond_options_AS2 as $isvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $isvValveCond_option['deviceType']],
                    ['code', '=', $isvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $isvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $isvValveCond_option['healthRating'],
                'title' => $isvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Bonnet Gasket */
        $isvValveCond_options_AS3 = [
            ['id' => 'AS3', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bolt Torque'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Material Compatibility'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($isvValveCond_options_AS3 as $isvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $isvValveCond_option['deviceType']],
                    ['code', '=', $isvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $isvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $isvValveCond_option['healthRating'],
                'title' => $isvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Valve Body */
        $isvValveCond_options_AS4 = [
            ['id' => 'AS4', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Cracked'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Eroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Eroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'High Cycling/Hard to Control'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Vibration'],
        ];
        foreach ($isvValveCond_options_AS4 as $isvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $isvValveCond_option['deviceType']],
                    ['code', '=', $isvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $isvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $isvValveCond_option['healthRating'],
                'title' => $isvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Valve Trim */
        $isvValveCond_options_AS5 = [
            ['id' => 'AS5', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bent Stem'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Eroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Galled'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Pitted'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($isvValveCond_options_AS5 as $isvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $isvValveCond_option['deviceType']],
                    ['code', '=', $isvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $isvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $isvValveCond_option['healthRating'],
                'title' => $isvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Body Bolts & Nuts */
        $isvValveCond_options_AS6 = [
            ['id' => 'AS6', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Loose'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Worn'],
        ];
        foreach ($isvValveCond_options_AS6 as $isvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $isvValveCond_option['deviceType']],
                    ['code', '=', $isvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $isvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $isvValveCond_option['healthRating'],
                'title' => $isvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Actuator External Condition */
        $isvValveCond_options_AS7 = [
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bent'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Eroded'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Galled'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Over Thrust/Torque'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Over Voltage'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Oversize'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Pitted'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Undersize'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Vibration'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Wet/Dirty Instrument Air'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($isvValveCond_options_AS7 as $isvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $isvValveCond_option['deviceType']],
                    ['code', '=', $isvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $isvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $isvValveCond_option['healthRating'],
                'title' => $isvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Electrical Enclosure */
        $isvValveCond_options_AS8 = [
            ['id' => 'AS8', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Cracked'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Temperature Capability'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Water Ingress'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($isvValveCond_options_AS8 as $isvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $isvValveCond_option['deviceType']],
                    ['code', '=', $isvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $isvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $isvValveCond_option['healthRating'],
                'title' => $isvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Seals */
        $isvValveCond_options_AS9 = [
            ['id' => 'AS9', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS9', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS9', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Missing'],
            ['id' => 'AS9', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Pinched'],
            ['id' => 'AS9', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
        ];
        foreach ($isvValveCond_options_AS9 as $isvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $isvValveCond_option['deviceType']],
                    ['code', '=', $isvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $isvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $isvValveCond_option['healthRating'],
                'title' => $isvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Gear Box */
        $isvValveCond_options_AS10 = [
            ['id' => 'AS10', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bent'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Dry Lubricant'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Eroded'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Galled'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Pitted'],
            ['id' => 'AS10', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
        ];
        foreach ($isvValveCond_options_AS10 as $isvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $isvValveCond_option['deviceType']],
                    ['code', '=', $isvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $isvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $isvValveCond_option['healthRating'],
                'title' => $isvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Manual Override */
        $isvValveCond_options_AS11 = [
            ['id' => 'AS11', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Bent'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Damaged'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Dry Lubricant'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS11', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
        ];
        foreach ($isvValveCond_options_AS11 as $isvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $isvValveCond_option['deviceType']],
                    ['code', '=', $isvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $isvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $isvValveCond_option['healthRating'],
                'title' => $isvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Instrument/Accessories Condition */
        $isvValveCond_options_AS12 = [
            ['id' => 'AS12', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Corroded'],
            ['id' => 'AS12', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Damaged'],
            ['id' => 'AS12', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS12', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Missing'],
            ['id' => 'AS12', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Out of Calibration'],
            ['id' => 'AS12', 'deviceType' => $deviceType->search('ISV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
        ];
        foreach ($isvValveCond_options_AS12 as $isvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $isvValveCond_option['deviceType']],
                    ['code', '=', $isvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $isvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $isvValveCond_option['healthRating'],
                'title' => $isvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }

        /* PRV assessment subject - options for valve condition */
        /* insert options for Body/Base */
        $prvValveCond_options_AS1 = [
            ['id' => 'AS1', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Cracked'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Galled'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Out of Calibration'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Pitted'],
        ];
        foreach ($prvValveCond_options_AS1 as $prvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $prvValveCond_option['deviceType']],
                    ['code', '=', $prvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $prvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $prvValveCond_option['healthRating'],
                'title' => $prvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Bonnet */
        $prvValveCond_options_AS2 = [
            ['id' => 'AS2', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Galled'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Pitted'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Spindle Bent'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Spring Damaged'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Unsealed'],
        ];
        foreach ($prvValveCond_options_AS2 as $prvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $prvValveCond_option['deviceType']],
                    ['code', '=', $prvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $prvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $prvValveCond_option['healthRating'],
                'title' => $prvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Body Bolts/Nuts */
        $prvValveCond_options_AS3 = [
            ['id' => 'AS3', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Loose'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Worn'],
        ];
        foreach ($prvValveCond_options_AS3 as $prvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $prvValveCond_option['deviceType']],
                    ['code', '=', $prvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $prvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $prvValveCond_option['healthRating'],
                'title' => $prvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Pilot */
        $prvValveCond_options_AS4 = [
            ['id' => 'AS4', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Galled'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Out of Calibration'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Pitted'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Spring Damaged'],
        ];
        foreach ($prvValveCond_options_AS4 as $prvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $prvValveCond_option['deviceType']],
                    ['code', '=', $prvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $prvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $prvValveCond_option['healthRating'],
                'title' => $prvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Manual Override */
        $prvValveCond_options_AS5 = [
            ['id' => 'AS5', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Bent'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Damaged'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Dry Lubricant'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('PRV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
        ];
        foreach ($prvValveCond_options_AS5 as $prvValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $prvValveCond_option['deviceType']],
                    ['code', '=', $prvValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $prvValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $prvValveCond_option['healthRating'],
                'title' => $prvValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }

        /* Manual Valve assessment subject - options for valve condition */
        /* insert options for Packing */
        $mavValveCond_options_AS1 = [
            ['id' => 'AS1', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Damaged'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Leak'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Material Incompatibility'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Packing Flange/Gland Torque'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS1', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($mavValveCond_options_AS1 as $mavValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $mavValveCond_option['deviceType']],
                    ['code', '=', $mavValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $mavValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $mavValveCond_option['healthRating'],
                'title' => $mavValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Pressure Seal Gasket Area */
        $mavValveCond_options_AS2 = [
            ['id' => 'AS2', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bolt Torque'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Eroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Galled'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Pitted'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS2', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($mavValveCond_options_AS2 as $mavValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $mavValveCond_option['deviceType']],
                    ['code', '=', $mavValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $mavValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $mavValveCond_option['healthRating'],
                'title' => $mavValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Bonnet Gasket */
        $mavValveCond_options_AS3 = [
            ['id' => 'AS3', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Material Compatibility'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bolt Torque'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
            ['id' => 'AS3', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
        ];
        foreach ($mavValveCond_options_AS3 as $mavValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $mavValveCond_option['deviceType']],
                    ['code', '=', $mavValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $mavValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $mavValveCond_option['healthRating'],
                'title' => $mavValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Valve Body */
        $mavValveCond_options_AS4 = [
            ['id' => 'AS4', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Cracked'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Eroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Eroded'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'High Cycling/Hard to Control'],
            ['id' => 'AS4', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Vibration'],
        ];
        foreach ($mavValveCond_options_AS4 as $mavValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $mavValveCond_option['deviceType']],
                    ['code', '=', $mavValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $mavValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $mavValveCond_option['healthRating'],
                'title' => $mavValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Valve Trim */
        $mavValveCond_options_AS5 = [
            ['id' => 'AS5', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bent Stem'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Eroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Galled'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Pitted'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
            ['id' => 'AS5', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Wrong Installation'],
        ];
        foreach ($mavValveCond_options_AS5 as $mavValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $mavValveCond_option['deviceType']],
                    ['code', '=', $mavValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $mavValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $mavValveCond_option['healthRating'],
                'title' => $mavValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Body Bolts & Nuts */
        $mavValveCond_options_AS6 = [
            ['id' => 'AS6', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Loose'],
            ['id' => 'AS6', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Worn'],
        ];
        foreach ($mavValveCond_options_AS6 as $mavValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $mavValveCond_option['deviceType']],
                    ['code', '=', $mavValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $mavValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $mavValveCond_option['healthRating'],
                'title' => $mavValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Gear Box */
        $mavValveCond_options_AS7 = [
            ['id' => 'AS7', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Bent'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Dry Lubricant'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Eroded'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Galled'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Pitted'],
            ['id' => 'AS7', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
        ];
        foreach ($mavValveCond_options_AS7 as $mavValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $mavValveCond_option['deviceType']],
                    ['code', '=', $mavValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $mavValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $mavValveCond_option['healthRating'],
                'title' => $mavValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        /* insert options for Manual Override */
        $mavValveCond_options_AS8 = [
            ['id' => 'AS8', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Bent'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Broken'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Corroded'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Damaged'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Dry Lubricant'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Good'), 'title' => 'Good'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Poor'), 'title' => 'Heavy Corroded'],
            ['id' => 'AS8', 'deviceType' => $deviceType->search('MAV'), 'healthRating' => $healthRating->search('Fair'), 'title' => 'Worn'],
        ];
        foreach ($mavValveCond_options_AS8 as $mavValveCond_option) {
            $valveConditionSubjects = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', $mavValveCond_option['deviceType']],
                    ['code', '=', $mavValveCond_option['id']],
                ])->first();

            ValveConditionOption::insert([
                'device_type_id' => $mavValveCond_option['deviceType'],
                'valve_condition_subject_id' => $valveConditionSubjects->id,
                'health_rating_id' => $mavValveCond_option['healthRating'],
                'title' => $mavValveCond_option['title'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
    }
}
