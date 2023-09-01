<?php

namespace App\Models\RequestOrder;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'client_contract';
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->start_date = Carbon::createFromFormat('d/m/Y', request('start_date'))->format('Y-m-d');
            $model->end_date = Carbon::createFromFormat('d/m/Y', request('end_date'))->format('Y-m-d');
        });

        static::updating(function ($model) {
            $model->start_date = Carbon::createFromFormat('d/m/Y', request('start_date'))->format('Y-m-d');
            $model->end_date = Carbon::createFromFormat('d/m/Y', request('end_date'))->format('Y-m-d');
        });
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    /**
     * Get all of the contractactivities for the Contract
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contractactivities(): HasMany
    {
        return $this->hasMany(ContractActivity::class, 'contract_id', 'id');
    }

    /**
     * Get all of the requestorders for the Contract
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requestorders(): HasMany
    {
        return $this->hasMany(RequestOrder::class, 'contract_id', 'id');
    }
}
