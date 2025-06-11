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
        Schema::create('tb_new_cuti', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peg')->nullable();
            $table->string('nik', 50)->nullable();
            $table->integer('id_unit')->nullable();
            $table->integer('id_mastercuti')->nullable();
            $table->string('kuota_cuti', 150)->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->integer('lama_cuti')->nullable();
            $table->string('pengganti_cuti', 100)->nullable();
            $table->string('keterangan', 100)->nullable();
            $table->integer('atasan_1')->nullable();
            $table->integer('atasan_2')->nullable();
            $table->integer('atasan_3')->nullable();
            $table->integer('approve_atasan_1')->nullable();
            $table->integer('approve_atasan_2')->nullable();
            $table->integer('approve_atasan_3')->nullable();
            $table->string('status_cuti', 50)->nullable();
            $table->date('tgl_pengajuan')->nullable();
            $table->string('file', 100)->nullable();
            $table->integer('his_sisa_cuti')->nullable();
            $table->integer('notif_status')->nullable();
            $table->string('keterangan_reject', 255)->nullable();
            $table->dateTime('date_approve_atasan_1')->nullable();
            $table->dateTime('date_approve_atasan_2')->nullable();
            $table->dateTime('date_approve_atasan_3')->nullable();
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
        Schema::dropIfExists('tb_new_cuti');
    }
};
