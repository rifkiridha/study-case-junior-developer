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
        Schema::create('kab_kota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provinsi_id')->constrained('provinsi');
            $table->string('nama_kab_kota');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kab_kota');
    }
};
