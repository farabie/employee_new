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
        Schema::create('tb_history_kerja', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 50)->nullable();
            $table->date('periode_start')->nullable();
            $table->date('periode_end')->nullable();
            $table->string('nama_perusahaan', 50)->nullable();
            $table->string('jenis_usaha', 50)->nullable();
            $table->string('alamat', 250)->nullable();
            $table->string('posisi_awal', 100)->nullable();
            $table->string('posisi_akhir', 100)->nullable();
            $table->integer('jumlah_karyawan')->nullable();
            $table->string('keterangan', 250)->nullable();
            $table->string('file', 150)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_history_kerja');
    }
};
