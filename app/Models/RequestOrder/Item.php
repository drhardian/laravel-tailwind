<?php

namespace App\Models\RequestOrder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;
    protected $table = 'item';
    protected $guarded = [];

    /**
     * Get the activity that owns the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'master_activity_code', 'id');
    }

    /**
     * Get the itemtype that owns the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function itemtype(): BelongsTo
    {
        return $this->belongsTo(ItemType::class, 'item_type_id', 'id');
    }

    /**
     * Get all of the costing for the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function costing(): HasMany
    {
        return $this->hasMany(Costing::class, 'item_id', 'id');
    }
}
