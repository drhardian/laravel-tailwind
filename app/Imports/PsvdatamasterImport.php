<?php

namespace App\Imports;

use App\Models\DropdownOption;
use App\Models\PsvMasterData\Psvdatamaster;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PsvdatamasterImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        #area
        DropdownOption::updateOrCreate(
            [ 'title' => $row['area'], 'dropdown_alias' => 'psv-area' ]
        );

        #flow station
        DropdownOption::updateOrCreate(
            [ 'title' => $row['flow_station'], 'dropdown_alias' => 'psv-flow' ]
        );

        #platform
        DropdownOption::updateOrCreate(
            [ 'title' => $row['platform'], 'dropdown_alias' => 'psv-platform' ]
        );

        #demolish
        if(!empty($row['demolish'])) {
            DropdownOption::updateOrCreate(
                [ 'title' => $row['demolish'], 'dropdown_alias' => 'psv-demolish' ]
            );
        }
        
        #manufacture
        if(!empty($row['manufacture'])) {
            DropdownOption::updateOrCreate(
                [ 'title' => $row['manufacture'], 'dropdown_alias' => 'psv-manufacture' ]
            );
        }
        
        #size in
        if(!empty($row['size_in']) && $row['size_in'] != "-") {
            DropdownOption::updateOrCreate(
                [ 'title' => $row['size_in'], 'dropdown_alias' => 'psv-size_in' ]
            );
        }
        
        #rating in
        if(!empty($row['rating_in']) && $row['rating_in'] != "-") {
            DropdownOption::updateOrCreate(
                [ 'title' => $row['rating_in'], 'dropdown_alias' => 'psv-rating_in' ]
            );
        }
        
        #connection in
        if(!empty($row['conection_in']) && $row['conection_in'] != "-") {
            DropdownOption::updateOrCreate(
                [ 'title' => $row['conection_in'], 'dropdown_alias' => 'psv-condi_in' ]
            );
        }
        
        #size out
        if(!empty($row['size_out']) && $row['size_out'] != "-") {
            DropdownOption::updateOrCreate(
                [ 'title' => $row['size_out'], 'dropdown_alias' => 'psv-size_out' ]
            );
        }

        #rating out
        if(!empty($row['rating_out']) && $row['rating_out'] != "-") {
            DropdownOption::updateOrCreate(
                [ 'title' => $row['rating_out'], 'dropdown_alias' => 'psv-rating_out' ]
            );
        }
        
        #connection out
        if(!empty($row['conection_out']) && $row['conection_out'] != "-") {
            DropdownOption::updateOrCreate(
                [ 'title' => $row['conection_out'], 'dropdown_alias' => 'psv-condi_out' ]
            );
        }
        
        #psv style
        if(!empty($row['psv_style'])) {
            DropdownOption::updateOrCreate(
                [ 'title' => $row['psv_style'], 'dropdown_alias' => 'psv-style' ]
            );
        }

        return new Psvdatamaster([
                #General Information
                'area' => $row['area'],
                'flow' => $row['flow_station'],
                'platform' => $row['platform'],
                'tag_number'=> $row['tag_number'],
                'operational'=> $row['operational'],
                'integrity'=> $row['integrity'],
                'cert_date'=> $row['cert_date'] !== null ? date('Y-m-d',strtotime($row['cert_date'])) : Carbon::now()->make(null),
                'cert_doc'=> $row['certificate_document'],
                'exp_date'=> $row['exp_date'] !== null ? date('Y-m-d',strtotime($row['exp_date'])) : Carbon::now()->make(null),
                'valve_number'=> $row['valve_number'],
                'status' => $row['status_update'],
                'deferal' => $row['deferal'],
                'resetting' => $row['resetting'],
                'resize' => $row['resize'],
                'demolish'=> $row['demolish'],
                'relief' => $row['relief_header'],
                'note' => $row['note'],
                'cert_package'  => $row['cert_package'],
                'klarifikasi' => $row['klarifikasi'],
                'by' => $row['by'],
                #Valve Information
                'manufacture' => $row['manufacture'],
                'model_number' => $row['model_number'],
                'serial_number' => $row['serial_number'],
                'size_in' => $row['size_in'],
                'rating_in' => $row['rating_in'],
                'condi_in' => $row['conection_in'],
                'size_out' => $row['size_out'],
                'rating_out' => $row['rating_out'],
                'condi_out' => $row['conection_out'],
                'press'  => $row['press'],
                'vacuum'  => $row['vacuum'],
                'psv' => $row['psv_style'],
                'design' => $row['orifice_design'],
                'selection' => $row['selection'],
                'psv_capacity' => $row['psv_capacity'],
                'psv_capacityunit' => $row['psv_capacity_unit'],
                'bonnet' => $row['bonnet_type'],
                'seat' => $row['seat_type'],
                'CAP' => $row['cap'],
                'body_bonnet' => $row['body_bonnet_material'],
                'disc_material' => $row['disc_material'],
                'spring_material' => $row['spring_material'],
                'guide_material' => $row['guide_material'],
                'resilient_seat' => $row['resilient_seat'],
                'bellow_material' => $row['bellow_material'],
                'year_build' => $row['year_build'],
                'year_install' => $row['year_install'],
                #Process Condition
                'service' => $row['service'],
                'equip_number' => $row['equipment_number'],
                'pid' => $row['pid'],
                'size_basic' => $row['size_basic'],
                'size_code' => $row['size_code'],
                'fluid' => $row['fluid'],
                'required' => $row['required_capacity'],
                'capacity_unit' => $row['capacity_unit'],
                'mawp' => $row['mawp'],
                'operating_psi' => $row['operating_psi'],
                'back_psi' => $row['back_pressure'],
                'operating_temp' => $row['operating_temp'],
                'cold_diff' => $row['cold_diff'],
                'allowable' => $row['allowable'],
                #Condition Replacement
                'shutdown' =>  $row['shutdown'],
                'valve_upstream' => $row['isolation_valve_upstream'],
                'condi_upstream' => $row['condition_upstream'],
                'valve_downstream' => $row['isolation_valve_downstream'],
                'condi_downstream' => $row['condition_downstream'],
                'scaffolding' => $row['scaffolding'],
                'spacer_inlet' => $row['use_spacer_inlet'],
                'spacer_outlet' => $row['use_spacer_outlet'],
        ]);
    }
}
