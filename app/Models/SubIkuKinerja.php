<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubIkuKinerja extends Model
{
    use HasFactory;

    protected $table = "sub_iku_kinerja";
    protected $guarded = ["id"];

    public function sub_iku_sasaran(): BelongsTo
    {
        return $this->belongsTo(SubIkuSasaran::class);
    }

    public function sub_iku_tahun(): BelongsTo
    {
        return $this->belongsTo(SubIkuTahun::class);
    }
}
