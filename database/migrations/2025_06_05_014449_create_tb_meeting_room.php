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
        Schema::create('tb_meeting_room', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('nama_peg', 255)->nullable();
            $table->string('divisi', 100)->nullable();
            $table->date('tgl_pengajuan')->nullable();
            $table->date('tgl_booking')->nullable();
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->string('ruangan', 100)->nullable();
            $table->string('keterangan', 150)->nullable();
            $table->string('kategori', 20)->nullable();
            $table->string('kategori_lainlain', 100)->nullable();
            $table->string('status_booking', 11)->nullable();
            $table->string('keterangan_reject', 190)->nullable();
            $table->string('keterangan_reschedule', 190)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_meeting_room');
    }
};
