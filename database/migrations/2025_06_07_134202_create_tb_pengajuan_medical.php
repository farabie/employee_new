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
        Schema::create('tb_pengajuan_medical', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_medical_claim', 50)->nullable();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('tertanggung', 100)->nullable();
            $table->string('jenis_rembuisement', 100)->nullable();
            $table->dateTime('tgl_pengajuan')->nullable();
            $table->date('tgl_bukti_kwitansi')->nullable();
            $table->string('keterangan', 150)->nullable();
            $table->string('file', 250)->nullable();
            $table->string('file_pendukung', 250)->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('hard_copy', 25)->nullable();
            $table->string('revision_id', 25)->nullable();
            $table->string('approve_hrd', 25)->nullable();
            $table->dateTime('date_approval_hrd')->nullable();
            $table->string('keterangan_hrd', 150)->nullable();
            $table->string('approve_gm_hrd', 25)->nullable();
            $table->dateTime('date_approval_gm_hrd')->nullable();
            $table->string('status', 50)->nullable();
            $table->string('keterangan_reject_hrd', 150)->nullable();
            $table->string('hard_copy_finance', 25)->nullable();
            $table->string('status_finance_verified', 25)->nullable();
            $table->string('verifiedByFinance', 25)->nullable();
            $table->dateTime('date_approval_finance_verified')->nullable();
            $table->string('keterangan_reject_finance', 150)->nullable();
            $table->string('paid', 25)->nullable();
            $table->string('jumlah_payment', 50)->nullable();
            $table->dateTime('date_approval_treasury')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pengajuan_medical');
    }
};
