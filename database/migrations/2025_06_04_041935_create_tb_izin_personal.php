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
        Schema::create('tb_izin_personal', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama_karyawan', 255)->nullable();
            $table->string('department', 255)->nullable();
            $table->string('date', 255)->nullable();
            $table->string('jenis_izin', 255)->nullable();
            $table->string('keterangan', 255)->nullable();
            $table->string('atasan1', 255)->nullable();
            $table->string('approve_atasan_1', 5)->nullable();
            $table->dateTime('date_approval_atasan_1')->nullable();
            $table->string('approve_hrd', 5)->nullable();
            $table->dateTime('date_approval_hrd')->nullable();
            $table->string('status', 255)->nullable();
            $table->string('suratsakit', 255)->nullable();
            $table->string('kembalikantor', 100)->nullable();
            $table->string('jam_keluar', 255)->nullable();
            $table->string('jam_kembali', 255)->nullable();
            $table->string('tujuan', 255)->nullable();
            $table->string('alasan', 255)->nullable();
            $table->string('id_absensi', 255)->nullable();
            $table->string('nik', 255)->nullable();
            $table->unsignedBigInteger('id_peg')->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();

            $table->foreign('id_peg')->references('id')->on('tb_pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_izin_personal');
    }
};
