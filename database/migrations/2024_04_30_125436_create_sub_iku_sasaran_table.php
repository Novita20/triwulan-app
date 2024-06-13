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
        Schema::create('sub_iku_sasaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId("sub_iku_id")->constrained("sub_iku")->cascadeOnDelete();
            $table->string("sasaran_pd", 255);
            $table->string("indikator_tujuan", 255);
            $table->string("formula", 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_iku_sasaran');
    }
};
