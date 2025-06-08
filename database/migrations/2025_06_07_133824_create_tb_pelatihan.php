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
        Schema::create('tb_pelatihan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('jenis_pelatihan', 50)->nullable();
            $table->string('nama_pelatihan', 128)->nullable();
            $table->string('tempat_pelatihan', 32)->nullable();
            $table->string('penyelenggara', 64)->nullable();
            $table->date('tanggal_mulai_pelatihan')->nullable();
            $table->date('tanggal_selesai_pelatihan')->nullable();
            $table->string('nomor_sertifikat_pelatihan', 32)->nullable();
            $table->date('tanggal_sertifikat_pelatihan')->nullable();
            $table->string('file_sertifikat', 32)->nullable();
            $table->string('lainlain_pelatihan', 150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pelatihan');
    }
};
