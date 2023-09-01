<?php

namespace App\Models\RequestOrder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ActivityUnitrate extends Model
{
    use HasFactory;
    protected $table = 'activity_unit_rate';
    protected $guarded = [];

    /**
     * Get the activity that owns the ActivityUnitrate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'activity_code', 'id');
    }

    /**
     * Get the user associated with the ActivityUnitrate
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unitrate(): HasOne
    {
        return $this->hasOne(UnitRate::class, 'id', 'unit_rate_id');
    }
}
