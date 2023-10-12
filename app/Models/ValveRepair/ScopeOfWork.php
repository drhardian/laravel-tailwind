<?php

namespace App\Models\ValveRepair;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ScopeOfWork extends Model
{
    use HasFactory;
    protected $table = "mvrr_scope_of_work";
    protected $guarded = [];

    /**
     * Get the scopeOfWork associated with the ScopeOfWork
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function scopeOfWork(): HasOne
    {
        return $this->hasOne(ValveRepairDropdown::class, 'id', 'scope_of_work_id');
    }

    /**
     * Get the repairReport associated with the ScopeOfWork
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function repairReport(): HasOne
    {
        return $this->hasOne(RepairReport::class, 'id', 'repair_report_id');
    }
}
