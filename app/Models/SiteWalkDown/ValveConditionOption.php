<?php

namespace App\Models\SiteWalkDown;

use App\Models\SiteWalkDown\HealthRating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ValveConditionOption extends Model
{
    use HasFactory;

    protected $fillable = ['device_type_id','valve_condition_subject_id','health_rating_id','title'];
    protected $table = 'swd_valve_condition_options';

    /**
     * Get the healthRating that owns the ValveConditionOption
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function healthRating(): BelongsTo
    {
        return $this->belongsTo(HealthRating::class);
    }
}
