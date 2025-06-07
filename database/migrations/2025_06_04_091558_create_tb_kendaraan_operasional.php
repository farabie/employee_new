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
        Schema::create('tb_kendaraan_operasional', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat_kendaraan_operasional', 30)->nullable();
            $table->string('nik', 15)->nullable();
            $table->string('nama_peg', 255)->nullable();
            $table->string('divisi', 30)->nullable();
            $table->string('tujuan', 100)->nullable();
            $table->integer('jumlah_orang')->nullable();
            $table->string('keterangan', 100)->nullable();
            $table->time('jam_berangkat')->nullable();
            $table->date('tgl_berangkat')->nullable();
            $table->time('jam_kembali')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->string('nik_final_approval', 15)->nullable();
            $table->string('final_approval', 20)->nullable();
            $table->dateTime('final_approval_date')->nullable();
            $table->string('ga_approval', 20)->nullable();
            $table->dateTime('ga_approval_date')->nullable();
            $table->string('status_approval', 20)->nullable();
            $table->string('keterangan_reject_approval', 200)->nullable();
            $table->string('keterangan_reject_ga', 200)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kendaraan_operasional');
    }
};
