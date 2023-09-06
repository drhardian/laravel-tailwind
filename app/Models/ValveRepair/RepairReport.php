<?php

namespace App\Models\ValveRepair;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RepairReport extends Model
{
    use HasFactory;
    protected $table = "mvrr_repair_reports";
    protected $guarded = [];

    /**
     * Get the user associated with the RepairReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderType(): HasOne
    {
        return $this->hasOne(ValveRepairDropdown::class, 'id', 'order_type');
    }
}
