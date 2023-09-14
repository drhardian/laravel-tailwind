<?php

namespace App\Models\PsvMasterData;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function valve(): HasMany
    {
        return $this->hasMany(Valve::class, 'valve_id', 'id');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function general(): BelongsTo
    {
        return $this->belongsTo(General::class, 'general_id', 'id');
    }
}