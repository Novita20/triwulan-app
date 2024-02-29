<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndikatorProgram extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'indikator_program';

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
