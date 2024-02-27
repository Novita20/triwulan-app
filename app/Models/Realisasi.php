<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Realisasi extends Model
{
    use HasFactory;

    protected $table = 'realisasi';

    protected $fillable = [
        'id_triwulan',
        'kinerja',
        'satuan',
        'realisasi_anggaran',
        'faktor_pendukung',
        'faktor_penghambat',
        'masalah',
        'solusi'
    ];

    public function triwulan(): BelongsTo
    {
        return $this->belongsTo(Triwulan::class);
    }

    public function realisasi_kinerja(): BelongsToMany
    {
        return $this->belongsToMany(IndikatorKinerja::class, 'realisasi_kinerja');
    }
}
