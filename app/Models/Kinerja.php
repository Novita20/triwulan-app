<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kinerja extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kinerja';

    protected $guarded = ['id'];

    public function Realisasi(): BelongsTo
    {
        return $this->belongsTo(Realisasi::class);
    }
}
