<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Realisasi extends Model
{
    use HasFactory;

    protected $table = 'realisasi';

    protected $fillable = [
        'kinerja_id',
        'status',
        'kinerja',
        'triwulan',
        'satuan',
        'realisasi_anggaran',
        'faktor_pendorong',
        'faktor_penghambat',
        'masalah',
        'solusi'
    ];

    public function indkinerja(): BelongsTo
    {
        return $this->belongsTo(Kinerja::class, 'kinerja_id');
    }
}
