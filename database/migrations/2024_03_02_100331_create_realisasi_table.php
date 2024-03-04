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
            $table->foreignId('kinerja_id')->constrained('kinerja')->cascadeOnDelete();
            $table->enum('triwulan', ['1', '2', '3', '4']);
            $table->integer('kinerja')->nullable();
            $table->string('satuan');
            $table->double('realisasi_anggaran')->nullable();
            $table->string('faktor_pendorong')->nullable();
            $table->string('faktor_penghambat')->nullable();
            $table->string('masalah')->nullable();
            $table->string('solusi')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
