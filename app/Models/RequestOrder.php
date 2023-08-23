<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RequestOrder extends Model
{
    use HasFactory;
    protected $table = 'request_order';
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->start_date = Carbon::parse(strtotime(request('start_date')))->format('Y-m-d');
            $model->end_date = Carbon::parse(strtotime(request('end_date')))->format('Y-m-d');
        });
    }

    /**
     * Get the contract that owns the RequestOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class, 'contract_id', 'id');
    }

    /**
     * Get the client that owns the RequestOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    /**
     * Get the orderactivity associated with the RequestOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderactivity(): HasOne
    {
        return $this->hasOne(RequestOrderActivity::class, 'request_order_id', 'id');
    }

    /**
     * Get all of the orderdetails for the RequestOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderdetails(): HasMany
    {
        return $this->hasMany(RequestOrderTransaction::class, 'request_order_id', 'id');
    }
}
