<?php

namespace App\Models\RequestOrder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitRate extends Model
{
    use HasFactory;
    protected $table = 'unit_rate';
    protected $guarded = [];

    /**
     * Get all of the costing for the UnitRate
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function costing(): HasMany
    {
        return $this->hasMany(Costing::class, 'unit_rate_id', 'id');
    }

    /**
     * Get all of the activityunitrate for the UnitRate
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activityunitrate(): HasMany
    {
        return $this->hasMany(ActivityUnitrate::class, 'unit_rate_id', 'id');
    }
}
