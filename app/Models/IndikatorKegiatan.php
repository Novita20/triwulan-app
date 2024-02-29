<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndikatorKegiatan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'indikator_kegiatan';

    protected $fillable = [
        'kegiatan_id',
        'indikator',
        'target',
        'satuan',
        'pagu'
    ];

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
