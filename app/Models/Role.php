<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    /**
     * Get all of the permission for the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions(): HasMany
    {
        return $this->hasMany(RolePermission::class);
    }

    /**
     * Get all of the role user for the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roleuser(): HasMany
    {
        return $this->hasMany(RoleUser::class);
    }
}
