<?php

namespace App\Models\ValveRepair;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ltsa extends Model
{
    use HasFactory;
    protected $table = "mvrr_ltsa";
    protected $guarded = [];


    /**
     * Get the repairReport associated with the Ltsa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function repairReport(): HasOne
    {
        return $this->hasOne(RepairReport::class, 'repair_report_id', 'id');
    }
}
