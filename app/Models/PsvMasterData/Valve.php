<?php

namespace App\Models\PsvMasterData;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valve extends Model
{
    use HasFactory;
    protected $table = 'psvdata_valve';
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->year_build = Carbon::createFromFormat('d/m/Y', request('year_build'))->format('Y-m-d');
            $model->year_install = Carbon::createFromFormat('d/m/Y', request('year_install'))->format('Y-m-d');
        });

        static::updating(function ($model) {
            $model->year_build = Carbon::createFromFormat('d/m/Y', request('year_build'))->format('Y-m-d');
            $model->year_install = Carbon::createFromFormat('d/m/Y', request('year_install'))->format('Y-m-d');
        });
    }
}