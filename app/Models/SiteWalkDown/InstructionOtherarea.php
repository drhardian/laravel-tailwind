<?php

namespace App\Models\SiteWalkDown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstructionOtherarea extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'swd_instruction_otherareas';

    /**
     * Get the otherarea that owns the InstructionOtherarea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function otherarea(): BelongsTo
    {
        return $this->belongsTo(Otherarea::class);
    }
}
