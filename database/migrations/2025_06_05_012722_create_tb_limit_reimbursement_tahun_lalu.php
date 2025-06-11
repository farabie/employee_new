<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_limit_reimbursement_tahun_lalu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peg')->nullable();
            $table->string('nik', 50)->nullable();
            $table->integer('kacamata')->nullable();
            $table->integer('limit_kacamata')->nullable();
            $table->integer('kehamilan')->nullable();
            $table->integer('limit_kehamilan')->nullable();
            $table->integer('pengobatan_gigi')->nullable();
            $table->integer('limit_pengobatan_gigi')->nullable();
            $table->integer('vaksinasi_anak')->nullable();
            $table->integer('limit_vaksinasi_anak')->nullable();
            $table->integer('medical_check_up')->nullable();
            $table->integer('limit_medical_check_up')->nullable();
            $table->integer('tunjangan_kesehatan')->nullable();
            $table->integer('limit_tunjangan_kesehatan')->nullable();
            $table->integer('saldo_total_rembuisement')->nullable();
            $table->integer('limit_total_rembuisement')->nullable();
            $table->string('tahun', 50)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();

            $table->foreign('id_peg')->references('id')->on('tb_pegawai')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_limit_reimbursement_tahun_lalu');
    }
};
