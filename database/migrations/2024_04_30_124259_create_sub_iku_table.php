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
        Schema::create('sub_iku', function (Blueprint $table) {
            $table->id();
            $table->string("misi_rpjmd", 255);
            $table->string("tujuan_rpjmd", 255);
            $table->string("sasaran_rpjmd", 255);
            $table->string("tujuan_pd", 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_iku');
    }
};
