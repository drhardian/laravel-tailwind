<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'client_contract';
    protected $guarded = [];

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
}
