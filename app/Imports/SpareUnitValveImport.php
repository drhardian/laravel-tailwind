<?php

namespace App\Imports;

use App\Models\CustomerAsset\CinaAssetType;
use App\Models\CustomerAsset\CinaProduct;
use App\Models\CustomerAsset\CinaProductLocation;
use App\Models\CustomerAsset\CinaProductOrigin;
use App\Models\CustomerAsset\CinaProductUom;
use App\Models\DropdownOption;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SpareUnitValveImport implements ToModel, WithHeadingRow
{
    public function model(array $row) 
    {
        #get product origin id
        $productOrigin = CinaProductOrigin::firstOrCreate([
            'title' => 'Asset - Spare Unit'
        ]);

        #get product location id
        $productLocation = CinaProductLocation::firstOrCreate([
            'title' => $row['current_location']
        ]);

        #get uom
        if(!empty($row['uom'])) {
            CinaProductUom::firstOrCreate([
                'title' => $row['uom']
            ]);
        }

        #get asset type
        $productType = CinaAssetType::firstOrCreate([
            'title' => 'Valve'
        ]);

        #ex station
        if(!empty($row['ex_station'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['ex_station'], 
                    'dropdown_alias' => 'cina-exstation' 
                ]
            );
        }

        #station
        if(!empty($row['station'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['station'], 
                    'dropdown_alias' => 'cina-station' 
                ]
            );
        }

        #requestor
        if(!empty($row['requestor'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['requestor'], 
                    'dropdown_alias' => 'cina-requestor' 
                ]
            );
        }

        #project
        if(!empty($row['project'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['project'], 
                    'dropdown_alias' => 'cina-project' 
                ]
            );
        }

        #brand
        if(!empty($row['valve_brand'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['valve_brand'], 
                    'dropdown_alias' => 'cina-brand' 
                ]
            );
        }

        #equipment
        if(!empty($row['equipment'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['equipment'], 
                    'dropdown_alias' => 'cina-equipment' 
                ]
            );
        }

        #valve type
        if(!empty($row['valve_type'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['valve_type'], 
                    'dropdown_alias' => 'cina-valvetype' 
                ]
            );
        }

        #valve size
        if(!empty($row['valve_size'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['valve_size'], 
                    'dropdown_alias' => 'cina-valvesize' 
                ]
            );
        }

        #valve rating
        if(!empty($row['valve_rating'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['valve_rating'], 
                    'dropdown_alias' => 'cina-valverating' 
                ]
            );
        }

        #end connection
        if(!empty($row['end_connection'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['end_connection'], 
                    'dropdown_alias' => 'cina-endconn' 
                ]
            );
        }

        #valve model
        if(!empty($row['valve_model'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['valve_model'], 
                    'dropdown_alias' => 'cina-valvemodel' 
                ]
            );
        }

        #valve condition
        if(!empty($row['valve_condition'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['valve_condition'], 
                    'dropdown_alias' => 'cina-valvecondition' 
                ]
            );
        }

        #actuator brand
        if(!empty($row['actuator_brand'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['actuator_brand'], 
                    'dropdown_alias' => 'cina-actuatorbrand' 
                ]
            );
        }

        #actuator type
        if(!empty($row['actuator_type'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['actuator_type'], 
                    'dropdown_alias' => 'cina-actuatortype' 
                ]
            );
        }

        #actuator size
        if(!empty($row['actuator_size'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['actuator_size'], 
                    'dropdown_alias' => 'cina-actuatorsize' 
                ]
            );
        }

        #actuator condition
        if(!empty($row['actuator_condition'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['actuator_condition'], 
                    'dropdown_alias' => 'cina-actuatorcondition' 
                ]
            );
        }

        #fail position
        if(!empty($row['fail_position'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['fail_position'], 
                    'dropdown_alias' => 'cina-failposition' 
                ]
            );
        }

        #positioner brand
        if(!empty($row['positioner_brand'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['positioner_brand'], 
                    'dropdown_alias' => 'cina-positionerbrand' 
                ]
            );
        }

        #positioner model
        if(!empty($row['positioner_model'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['positioner_model'], 
                    'dropdown_alias' => 'cina-positionermodel' 
                ]
            );
        }

        #positioner condition
        if(!empty($row['positioner_condition'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['positioner_condition'], 
                    'dropdown_alias' => 'cina-positionercondition' 
                ]
            );
        }

        #input signal
        if(!empty($row['input_signal'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['input_signal'], 
                    'dropdown_alias' => 'cina-inputsignal' 
                ]
            );
        }

        #other accessories
        if(!empty($row['other_accessories'])) {
            DropdownOption::updateOrCreate(
                [ 
                    'title' => $row['other_accessories'], 
                    'dropdown_alias' => 'cina-otheraccessories' 
                ]
            );
        }

        return new CinaProduct([
            'cina_product_origin_id' => $productOrigin->id,
            'material_transfer' => $row['material_transfer'],
            'reservation_number' => $row['reservation_number'],
            'ex_station' => $row['ex_station'],
            'old_id' => $row['old_id'],
            'new_id' => $row['new_id'],
            'sdv_in' => $row['sdv_in'],
            'sdv_out' => $row['sdv_out'],
            'station' => $row['station'],
            'requestor' => $row['requestor'],
            'project' => $row['project'],
            'dt_out' => $row['date_out'] !== null ? date('Y-m-d',strtotime($row['date_out'])) : Carbon::now()->make(null),
            'date_to_offshore' => $row['date_to_offshore'] !== null ? date('Y-m-d',strtotime($row['date_to_offshore'])) : Carbon::now()->make(null),
            'material_transfer_to_offshore' => $row['material_transfer_to_offshore'],
            'cina_product_location_id' => $productLocation->id,
            'in_date' => $row['date_in'] !== null ? date('Y-m-d',strtotime($row['date_in'])) : Carbon::now()->make(null),
            'in_qty' => $row['stock_in'],
            'in_uom' => $row['uom'],
            'out_date' => $row['date_out'] !== null ? date('Y-m-d',strtotime($row['date_out'])) : Carbon::now()->make(null),
            'out_qty' => $row['stock_out'],
            'out_uom' => $row['uom'],
            'target_pdn' => $row['target_pdn'] !== null ? date('Y-m-d',strtotime($row['target_pdn'])) : Carbon::now()->make(null),
            'cs_release' => $row['cs_release'],
            'cs_number' => $row['cs_number'],
            'ce_number' => $row['ce_number'],
            'ro_number' => $row['ro_number'],
            'start_date' => $row['start_date'] !== null ? date('Y-m-d',strtotime($row['start_date'])) : Carbon::now()->make(null),
            'end_date' => $row['end_date'] !== null ? date('Y-m-d',strtotime($row['end_date'])) : Carbon::now()->make(null),
            'repair_price' => $row['price_repair'],
            'notes' => $row['remark'],
            'cina_asset_type_id' => $productType->id,
            'brand' => $row['valve_brand'],
            'equipment' => $row['equipment'],
            'valve_type' => $row['valve_type'],
            'valve_size' => $row['valve_size'],
            'valve_rating' => $row['valve_rating'],
            'end_connection' => $row['end_connection'],
            'serial_number' => $row['serial_number'],
            'valve_model' => $row['valve_model'],
            'valve_condition' => $row['valve_condition'] !== null ? $row['valve_condition'] : '-',
            'actuator_brand' => $row['actuator_brand'],
            'actuator_type' => $row['actuator_type'],
            'actuator_size' => $row['actuator_size'],
            'actuator_condition' => $row['actuator_condition'],
            'fail_position' => $row['fail_position'],
            'positioner_brand' => $row['positioner_brand'],
            'positioner_model' => $row['positioner_model'],
            'positioner_condition' => $row['positioner_condition'],
            'input_signal' => $row['input_signal'],
            'other_accessories' => $row['other_accessories'],
        ]);
    }
}
