<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function kinerja(): HasMany
    {
        return $this->hasMany(Kinerja::class);
    }
}
