<?php

namespace App\Models\ValveRepair;

use App\Models\FileUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    /**
     * Get the workType associated with the RepairReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function workType(): HasOne
    {
        return $this->hasOne(ValveRepairDropdown::class, 'id', 'work_type');
    }

    /**
     * Get the scopeOfWork associated with the RepairReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function scopeOfWork(): HasOne
    {
        return $this->hasOne(ValveRepairDropdown::class, 'id', 'scope_of_work');
    }

    /**
     * Get the repairType associated with the RepairReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function repairType(): HasOne
    {
        return $this->hasOne(ValveRepairDropdown::class, 'id', 'repair_type');
    }

    /**
     * Get the deviceDetail associated with the RepairReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function deviceDetail(): HasOne
    {
        return $this->hasOne(DeviceDetail::class, 'repair_report_id', 'id');
    }

    /**
     * Get all of the Files for the RepairReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Files(): HasMany
    {
        return $this->hasMany(FileUpload::class, 'reference_id', 'id');
    }

    /**
     * Get the Ltsa associated with the RepairReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Ltsa(): HasOne
    {
        return $this->hasOne(Ltsa::class, 'repair_report_id', 'id');
    }
}
