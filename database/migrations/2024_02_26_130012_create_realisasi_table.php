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
        Schema::create('realisasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_triwulan')->constrained('triwulan')->cascadeOnDelete();
            $table->integer('kinerja');
            $table->string('satuan');
            $table->double('realisasi_anggaran');
            $table->string('faktor_pendorong');
            $table->string('faktor_penghambat');
            $table->string('masalah');
            $table->string('solusi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisasi');
    }
};
