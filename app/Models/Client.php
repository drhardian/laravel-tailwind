<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    protected $table = 'client';
    protected $guarded = [];

    /**
     * Get all of the contracts for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class, 'client_id', 'id');
    }

    /**
     * Get all of the requestorders for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requestorders(): HasMany
    {
        return $this->hasMany(RequestOrder::class, 'client_id', 'id');
    }
}
