<?php

namespace App\Models\ValveRepair;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DeviceDetail extends Model
{
    use HasFactory;
    protected $table = "mvrr_device_detail";
    protected $guarded = [];

    /**
     * Get the deviceType associated with the DeviceDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function deviceType(): HasOne
    {
        return $this->hasOne(ValveRepairDropdown::class, 'id', 'device_type');
    }

    /**
     * Get the deviceTypeSelected associated with the DeviceDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function deviceTypeSelected(): HasOne
    {
        return $this->hasOne(ValveRepairDropdown::class, 'id', 'device_type_selected_type');
    }
    /**
     * Get the process associated with the DeviceDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Process(): HasOne
    {
        return $this->hasOne(ValveRepairDropdown::class, 'id', 'process');
    }
}
