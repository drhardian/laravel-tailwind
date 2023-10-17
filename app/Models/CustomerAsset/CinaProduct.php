<?php

namespace App\Models\CustomerAsset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class CinaProduct extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            if(empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function getIncrementing() {
        return false;
    }

    public function getKeyType() {
        return 'string';
    }

    /**
     * Get the cinaProductOrigin that owns the CinaProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cinaProductOrigin(): BelongsTo
    {
        return $this->belongsTo(CinaProductOrigin::class);
    }

    /**
     * Get the cinaAssetType that owns the CinaProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cinaAssetType(): BelongsTo
    {
        return $this->belongsTo(CinaAssetType::class);
    }

    /**
     * Get the cinaProductLocation that owns the CinaProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cinaProductLocation(): BelongsTo
    {
        return $this->belongsTo(CinaProductLocation::class);
    }
}
