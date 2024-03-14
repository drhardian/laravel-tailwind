<?php

namespace App\Models\SiteWalkDown;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstructionPerson extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'swd_instruction_people';

    /**
     * Get the user that owns the InstructionPerson
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_account(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'username');
    }
}
