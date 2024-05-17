<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubIkuTahun extends Model
{
    use HasFactory;

    protected $table = "sub_iku_tahun";
    protected $guarded = ["id"];

    public function sub_iku_kinerja(): HasOne
    {
        return $this->hasOne(SubIkuKinerja::class);
    }
}
