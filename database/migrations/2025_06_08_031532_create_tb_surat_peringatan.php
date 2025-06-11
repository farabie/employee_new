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
        Schema::create('tb_surat_peringatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peg')->nullable();
            $table->string('nik', 20)->nullable();
            $table->string('jenis_sp', 10)->nullable();
            $table->date('periode_awal')->nullable();
            $table->date('periode_akhir')->nullable();
            $table->string('keterangan', 150)->nullable();
            $table->string('file', 100)->nullable();
            $table->timestamps();

            $table->foreign('id_peg')->references('id')->on('tb_pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_surat_peringatan');
    }
};
