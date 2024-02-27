<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IndikatorProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'indikator',
        'target',
        'satuan',
        'pagu'
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
}
