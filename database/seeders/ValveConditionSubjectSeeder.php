<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\DeviceType;
use App\Models\SiteWalkDown\ValveConditionSubject;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ValveConditionSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $deviceTypeId = DeviceType::select('id')->where('initial', 'PRV')->first();

        $deviceTypes = DeviceType::select('id','initial')->get();
        $deviceType = collect();
        foreach ($deviceTypes as $value) {
            $deviceType->put($value->id, $value->initial);
        }

        /* CONTROL VALVE */
        ValveConditionSubject::insert([
            [ 'device_type_id' => $deviceType->search('COV'), 'code' => 'AS1', 'description' => 'Packing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('COV'), 'code' => 'AS2', 'description' => 'Bonnet', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('COV'), 'code' => 'AS3', 'description' => 'Bonnet Gasket', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('COV'), 'code' => 'AS4', 'description' => 'Valve Body', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('COV'), 'code' => 'AS5', 'description' => 'Valve Trim', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('COV'), 'code' => 'AS6', 'description' => 'Body Bolts & Nuts', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('COV'), 'code' => 'AS7', 'description' => 'Actuator External Condition', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('COV'), 'code' => 'AS8', 'description' => 'Electrical Enclosure', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('COV'), 'code' => 'AS9', 'description' => 'Seals', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('COV'), 'code' => 'AS10', 'description' => 'Gear Box', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('COV'), 'code' => 'AS11', 'description' => 'Manual Override', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('COV'), 'code' => 'AS12', 'description' => 'Positioner & Accessories', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);

        /* REGULATOR */
        ValveConditionSubject::insert([
            [ 'device_type_id' => $deviceType->search('REG'), 'code' => 'AS1', 'description' => 'Body/Base', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('REG'), 'code' => 'AS2', 'description' => 'Body Bolts & Nuts', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('REG'), 'code' => 'AS3', 'description' => 'Bonnet', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('REG'), 'code' => 'AS4', 'description' => 'Pilot', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('REG'), 'code' => 'AS5', 'description' => 'Manual Override', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);

        /* CHECK VALVE */
        ValveConditionSubject::insert([
            [ 'device_type_id' => $deviceType->search('CKV'), 'code' => 'AS1', 'description' => 'Packing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('CKV'), 'code' => 'AS2', 'description' => 'Body Bolts & Nuts', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('CKV'), 'code' => 'AS3', 'description' => 'Pressure Seal Gasket Area', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('CKV'), 'code' => 'AS4', 'description' => 'Bonnet Gasket', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('CKV'), 'code' => 'AS5', 'description' => 'Manual Override', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);

        /* ISOLATION VALVE */
        ValveConditionSubject::insert([
            [ 'device_type_id' => $deviceType->search('ISV'), 'code' => 'AS1', 'description' => 'Packing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('ISV'), 'code' => 'AS2', 'description' => 'Pressure Seal Gasket Area', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('ISV'), 'code' => 'AS3', 'description' => 'Bonnet Gasket', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('ISV'), 'code' => 'AS4', 'description' => 'Valve Body', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('ISV'), 'code' => 'AS5', 'description' => 'Valve Trim', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('ISV'), 'code' => 'AS6', 'description' => 'Body Bolts & Nuts', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('ISV'), 'code' => 'AS7', 'description' => 'Actuator External Condition', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('ISV'), 'code' => 'AS8', 'description' => 'Electrical Enclosure', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('ISV'), 'code' => 'AS9', 'description' => 'Seals', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('ISV'), 'code' => 'AS10', 'description' => 'Oil Leak', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('ISV'), 'code' => 'AS11', 'description' => 'Gear Box', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('ISV'), 'code' => 'AS12', 'description' => 'Manual Override', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('ISV'), 'code' => 'AS13', 'description' => 'Instrument/Accessories Condition', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);

        /* PRV */
        ValveConditionSubject::insert([
            [ 'device_type_id' => $deviceType->search('PRV'), 'code' => 'AS1', 'description' => 'Body/Base', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('PRV'), 'code' => 'AS2', 'description' => 'Bonnet', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('PRV'), 'code' => 'AS3', 'description' => 'Body Bolts & Nuts', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('PRV'), 'code' => 'AS4', 'description' => 'Pilot', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('PRV'), 'code' => 'AS5', 'description' => 'Manual Override', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);

        /* MANUAL VALVE */
        ValveConditionSubject::insert([
            [ 'device_type_id' => $deviceType->search('MAV'), 'code' => 'AS1', 'description' => 'Packing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('MAV'), 'code' => 'AS2', 'description' => 'Pressure Seal Gasket Area', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('MAV'), 'code' => 'AS3', 'description' => 'Bonnet Gasket', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('MAV'), 'code' => 'AS4', 'description' => 'Valve Body', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('MAV'), 'code' => 'AS5', 'description' => 'Valve Trim', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('MAV'), 'code' => 'AS6', 'description' => 'Body Bolts & Nuts', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('MAV'), 'code' => 'AS7', 'description' => 'Gear Box', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'device_type_id' => $deviceType->search('MAV'), 'code' => 'AS8', 'description' => 'Manual Override', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);
    }
}
