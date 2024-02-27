<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'program_id',
        'no_rekening',
        'nama_kegiatan'
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function sub_kegiatan(): HasMany
    {
        return $this->hasMany(SubKegiatan::class);
    }

    public function indikator_kegiatan(): HasOne
    {
        return $this->hasOne(IndikatorKegiatan::class);
    }
}
