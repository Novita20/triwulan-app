<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Triwulan extends Model
{
    use HasFactory;

    protected $table = 'triwulan';

    protected $fillable = [
        'triwulan',
        'status'
    ];

    public function triwulan(): HasMany
    {
        return $this->hasMany(Realisasi::class);
    }
}
