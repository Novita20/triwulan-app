<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubIku extends Model
{
    use HasFactory;

    protected $table = "sub_iku";
    protected $guarded = ["id"];

    public function subIkuSasaran(): HasMany
    {
        return $this->hasMany(SubIkuSasaran::class);
    }

    public function realisasiSubIku(): HasMany
    {
        return $this->hasMany(RealisasiSubIku::class);
    }

    public function subIkuKinerja(): HasMany
    {
        return $this->hasMany(SubIkuKinerja::class, 'sub_iku_id');
    }
}
