<?php

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
        Schema::create('kinerja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subkegiatan_id')->constrained('subkegiatan')->cascadeOnDelete();
            $table->string('indikator');
            $table->double('target');
            $table->string('satuan');
            $table->double('pagu');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kinerja');
    }
};
