<?php

use App\Models\SubIkuKinerja;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('realisasi_sub_ikus', function (Blueprint $table) {
            $table->id();
            $table->foreignId("sub_iku_id")->constrained("sub_iku")->cascadeOnDelete();
            $table->foreignId("sub_iku_kinerja_id")->constrained("sub_iku_kinerja")->cascadeOnDelete();
            $table->integer('kinerja')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisasi_sub_ikus');
    }
};
