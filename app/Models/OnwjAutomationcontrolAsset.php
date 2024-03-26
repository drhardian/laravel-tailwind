<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnwjAutomationcontrolAsset extends Model
{
    use HasFactory;
    protected $fillable = [
        'area',
        'subarea',
        'platform',
        'description',
        'tagnumber',
        'asset_type',
        'plc_brand',
        'plc_controller',
        'ows_os',
        'ows_brand',
        'ews_os',
        'ews_brand',
        'software_hmi',
        'software_config',
        'installation_date',
        'operation_type',
        'integritystatus',
        'plc_status',
        'hmi_status',
        'ews_server_status',
        'ups_status',
        'environment_status',
        'notes'
    ];
}
