<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IndikatorKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'indikator',
        'target',
        'satuan',
        'pagu'
    ];

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(IndikatorKegiatan::class);
    }
}
