<?php

namespace App\Models\SiteWalkDown;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Assessment extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'swd_assessments';

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            if(empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }

            $model->activity_date = Carbon::createFromFormat('d/m/Y', request()->activity_date);
        });

        static::updating(function ($model) {
            $model->activity_date = Carbon::createFromFormat('d/m/Y', request()->activity_date);
        });
    }

    public function getIncrementing() {
        return false;
    }

    public function getKeyType() {
        return 'string';
    }

    # Get the product (table products) that owns the Assessment
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    # Get the instruction (table instructions) that owns the Assessment
    public function instruction(): BelongsTo
    {
        return $this->belongsTo(Instruction::class);
    }

    # Get the company (table companies) that owns the Assessment
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    # Get the criticality rating (table criticality_levels) that owns the Assessment
    public function criticalityLevel(): BelongsTo
    {
        return $this->belongsTo(CriticalityLevel::class);
    }

    # Get the health rating (table health_ratings) that owns the Assessment
    public function healthRating(): BelongsTo
    {
        return $this->belongsTo(HealthRating::class);
    }

    # Get the priority rating (table priority ratings) that owns the Assessment
    public function priorityRating(): BelongsTo
    {
        return $this->belongsTo(PriorityRating::class);
    }

    # Get the device type (table device_types) that owns the Assessment
    public function deviceType(): BelongsTo
    {
        return $this->belongsTo(DeviceType::class);
    }

    # Get the area (table areas) that owns the Assessment
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    # Get the location type (table location_types) that owns the Assessment
    public function locationType(): BelongsTo
    {
        return $this->belongsTo(LocationType::class);
    }

    # Get the detail location (table location_details) that owns the Assessment
    public function locationDetail(): BelongsTo
    {
        return $this->belongsTo(LocationDetail::class);
    }

    # Get the user associated with the Assessment
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'username', 'inspected_by')->withDefault();
    }

    # Get all of the assessmentImages for the Assessment
    public function assessmentImages(): HasMany
    {
        return $this->hasMany(AssessmentImage::class);
    }
}
