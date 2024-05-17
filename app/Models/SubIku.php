<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubIku extends Model
{
    use HasFactory;

    protected $table = "sub_iku";
    protected $guarded = ["id"];

    public function sub_iku_sasaran(): HasMany
    {
        return $this->hasMany(SubIkuSasaran::class);
    }
}
