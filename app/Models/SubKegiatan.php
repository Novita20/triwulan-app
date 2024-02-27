<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubKegiatan extends Model
{
    use HasFactory;

    protected $table = 'subkegiatan';

    protected $fillable = [
        'kegiatan_id',
        'no_rekening',
        'nama_subkegiatan'
    ];

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function indikator_kerja(): HasOne
    {
        return $this->hasOne(IndikatorKinerja::class);
    }
}
