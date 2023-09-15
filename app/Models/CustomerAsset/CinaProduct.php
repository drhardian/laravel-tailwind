<?php

namespace App\Models\CustomerAsset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CinaProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    
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
}
