<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class IndikatorKinerja extends Model
{
    use HasFactory;

    protected $table = 'indikator_kinerja';

    // protected $fillable = [
    //     'subkegiatan_id',
    //     'indikator',
    //     'target',
    //     'satuan',
    //     'pagu',
    //     'tanggal'
    // ];

    protected $guarded = ['id'];

    public function subkegiatan(): BelongsTo
    {
        return $this->belongsTo(SubKegiatan::class);
    }

    public function realisasi_kinerja(): BelongsToMany
    {
        return $this->belongsToMany(Realisasi::class, 'realisasi_kinerja');
    }
}
