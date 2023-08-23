<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestOrderTransaction extends Model
{
    use HasFactory;
    protected $table = 'request_order_trans';
    protected $guarded = [];

    /**
     * Get the order that owns the RequestOrderTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(RequestOrder::class, 'request_order_id', 'id');
    }

    /**
     * Get the costing that owns the RequestOrderTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function costing(): BelongsTo
    {
        return $this->belongsTo(Costing::class, 'costing_id', 'id');
    }
}
