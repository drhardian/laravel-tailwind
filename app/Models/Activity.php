<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'master_activity';
    protected $guarded = [];

    /**
     * Get all of the item for the Activity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function item(): HasMany
    {
        return $this->hasMany(Item::class, 'master_activity_code', 'id');
    }

    /**
     * Get all of the activityunitrate for the Activity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activityunitrate(): HasMany
    {
        return $this->hasMany(ActivityUnitrate::class, 'activity_code', 'id');
    }

    /**
     * Get the contractactivity associated with the Activity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contractactivity(): HasOne
    {
        return $this->hasOne(ContractActivity::class, 'activity_id', 'id');
    }
}
