<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubIkuSasaran extends Model
{
    use HasFactory;

    protected $table = "sub_iku_sasaran";
    protected $guarded = ["id"];

    public function sub_iku(): BelongsTo
    {
        return $this->belongsTo(SubIku::class);
    }
}
