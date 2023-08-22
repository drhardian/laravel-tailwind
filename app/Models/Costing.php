<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Costing extends Model
{
    use HasFactory;
    protected $table = 'costing';
    protected $guarded = [];

    /**
     * Get the unitrate that owns the Costing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unitrate(): BelongsTo
    {
        return $this->belongsTo(UnitRate::class, 'unit_rate_id', 'id');
    }

    /**
     * Get the item that owns the Costing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}
