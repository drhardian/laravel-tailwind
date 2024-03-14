<?php

namespace App\Models\SiteWalkDown;

use App\Models\SiteWalkDown\DeviceType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ValveConditionSubject extends Model
{
    use HasFactory;

    protected $fillable = ['device_type_id','code','description'];
    protected $table = 'swd_valve_condition_subjects';

    /**
     * Get the devicetype that owns the ValveConditionSubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function devicetype(): BelongsTo
    {
        return $this->belongsTo(DeviceType::class);
    }
}
