<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubIkuKinerja extends Model
{
    use HasFactory;

    protected $table = "sub_iku_kinerja";
    protected $guarded = ["id"];

    public function subIku(): BelongsTo
    {
        return $this->belongsTo(SubIku::class, 'sub_iku_id');
    }

    public function realisasiSubIku(): HasOne
    {
        return $this->hasOne(RealisasiSubIku::class, 'sub_iku_kinerja_id');
    }
}
