<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemType extends Model
{
    use HasFactory;
    protected $table = 'master_item_type';
    protected $guarded = [];

    /**
     * Get all of the item for the ItemType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function item(): HasMany
    {
        return $this->hasMany(Item::class, 'item_type_id', 'id');
    }

    /**
     * Get the activity that owns the ItemType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }
}
