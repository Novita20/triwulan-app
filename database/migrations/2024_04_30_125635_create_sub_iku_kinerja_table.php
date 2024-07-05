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
        Schema::create('sub_iku_kinerja', function (Blueprint $table) {
            $table->id();
            $table->foreignId("sub_iku_id")->constrained("sub_iku")->cascadeOnDelete();
            $table->foreignId("sub_iku_sasaran_id")->constrained("sub_iku_sasaran")->cascadeOnDelete();
            $table->string("tahun", 4);
            $table->double("angka_kinerja");
            $table->string("satuan", 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_iku_kinerja');
    }
};
