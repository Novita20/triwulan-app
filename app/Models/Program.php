<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Program extends Model
{
    use HasFactory;

    protected $table = 'program';

    protected $fillable = [
        'no_rekening',
        'nama_program',
        'tahun'
    ];

    public function kegiatan(): HasMany
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function indikator_program(): HasOne
    {
        return $this->hasOne(IndikatorProgram::class);
    }
}
