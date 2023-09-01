<?php

namespace App\Models\RequestOrder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RequestOrderActivity extends Model
{
    use HasFactory;
    protected $table = 'request_order_activity';
    protected $guarded = [];

    /**
     * Get the requestorder that owns the RequestOrderActivity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(RequestOrder::class, 'request_order_id', 'id');
    }

    /**
     * Get the activity that owns the RequestOrderActivity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'activity_code', 'id');
    }

    /**
     * Get all of the ordertransactions for the RequestOrderActivity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordertransactions(): HasMany
    {
        return $this->hasMany(RequestOrderTransaction::class, 'request_order_id', 'request_order_id');
    }
}
