<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RealisasiSubIku extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subIku():BelongsTo
    {
        return $this->belongsTo(SubIku::class);
    }

    public function subIkuKinerja(): BelongsTo
    {
        return $this->belongsTo(SubIkuKinerja::class);
    }
}
