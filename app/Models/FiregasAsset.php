<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiregasAsset extends Model
{
    use HasFactory;
    protected $fillable = [
        'area',
        'subarea',
        'platform',
        'tagnumber',
        'sensorlocation',
        'equipment_type',
        'asset_type',
        'manufacturer',
        'modelnumber',
        'partnumber',
        'serialnumber',
        'startup',
        'lastexecution',
        'totalhours',
        'numberoftagfailures',
        'numberofserialfailures',
        'testinterval',
        'failurerate',
        'pfd'
    ];
}
