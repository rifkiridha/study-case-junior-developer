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
        Schema::create('calon_nasabah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->foreignId('pekerjaan_id')->constrained('pekerjaan')->onDelete('cascade');
            $table->foreignId('provinsi_id')->constrained('provinsi');
            $table->foreignId('kab_kota_id')->constrained('kab_kota');
            $table->foreignId('kecamatan_id')->constrained('kecamatan');
            $table->foreignId('kelurahan_id')->constrained('kelurahan');
            $table->string('nama_jalan');
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->decimal('nominal_setor', 15, 2);
            $table->foreignId('kantor_cabang_id')->constrained('kantor_cabang');
            $table->enum('status', ['Menunggu Approval', 'Disetujui'])->default('Menunggu Approval');
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_nasabah');
    }
};
