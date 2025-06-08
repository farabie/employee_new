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
        Schema::create('tb_pengajuan_spd', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_spd', 150)->nullable();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('nama_peg', 200)->nullable();
            $table->string('divisi', 150)->nullable();
            $table->string('grade', 5)->nullable();
            $table->string('ket_spd', 5)->nullable();
            $table->string('tujuan', 100)->nullable();
            $table->date('tgl_berangkat')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->integer('jml_hari')->nullable();
            $table->string('ket_tgl_kembali', 20)->nullable();
            $table->string('transportasi', 50)->nullable();
            $table->string('transportasi_lainlain', 100)->nullable();
            $table->string('kendaraan_oper', 10)->nullable();
            $table->string('jenis_kendaraan', 100)->nullable();
            $table->string('alasan_sewa', 100)->nullable();
            $table->string('akomodasi', 10)->nullable();
            $table->string('jenis_akomodasi', 50)->nullable();
            $table->string('nama_serpo', 50)->nullable();
            $table->string('ket_lain', 250)->nullable();
            $table->string('maksud_tujuan', 150)->nullable();
            $table->string('catatan', 150)->nullable();
            $table->string('nama_proyek', 150)->nullable();
            $table->string('file', 250)->nullable();
            $table->string('atasan1', 10)->nullable();
            $table->string('approve_atasan_1', 10)->nullable();
            $table->dateTime('date_approve_atasan1')->nullable();
            $table->string('atasan1_asby', 150)->nullable();
            $table->string('atasan2', 10)->nullable();
            $table->string('approve_atasan_2', 10)->nullable();
            $table->dateTime('date_approve_atasan2')->nullable();
            $table->string('atasan2_asby', 150)->nullable();
            $table->string('approve_hrd', 10)->nullable();
            $table->dateTime('date_approve_hrd')->nullable();
            $table->string('approve_gm_hrd', 10)->nullable();
            $table->dateTime('date_approve_gm_hrd')->nullable();
            $table->string('status_spd', 10)->nullable();
            $table->string('keterangan_reject', 255)->nullable();
            $table->string('status_finance_verifikasi', 10)->nullable();
            $table->dateTime('date_approve_finance_verifikasi')->nullable();
            $table->string('verifiedByFinance', 50)->nullable();
            $table->string('status_payment', 10)->nullable();
            $table->dateTime('date_approve_finance_treasury')->nullable();
            $table->string('ket_reject_finance', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pengajuan_spd');
    }
};
