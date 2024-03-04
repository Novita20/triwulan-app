<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kinerja extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kinerja';

    // protected $fillable = [
    //     'subkegiatan_id',
    //     'indikator',
    //     'target',
    //     'satuan',
    //     'pagu'
    // ];

    protected $guarded = ['id'];

    public function subkegiatan(): BelongsTo
    {
        return $this->belongsTo(SubKegiatan::class);
    }

    public function realisasi(): HasMany
    {
        return $this->hasMany(Realisasi::class);
    }
}