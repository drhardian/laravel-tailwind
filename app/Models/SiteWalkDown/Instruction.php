<?php

namespace App\Models\SiteWalkDown;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Instruction extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'swd_instruction';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->instruction_num = "INS-".Carbon::now()->format('Y')."-".rand(1000000,9999999).Carbon::now()->format('is');
        });
    }

    /**
     * Get the companny that owns the Instruction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the area that owns the Instruction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
