<?php

namespace App\Models;

use App\Models\Catalog\Catalogproduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryProductoutReference extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the inventoryProductoutTransaction that owns the InventoryProductoutReference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventoryProductoutTransaction(): BelongsTo
    {
        return $this->belongsTo(InventoryProductoutTransaction::class);
    }

    /**
     * Get the catalogProduct that owns the InventoryProductoutReference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function catalogProduct(): BelongsTo
    {
        return $this->belongsTo(Catalogproduct::class);
    }
}
