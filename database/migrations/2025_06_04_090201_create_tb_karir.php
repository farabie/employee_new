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
        Schema::create('tb_karir', function (Blueprint $table) {
            $table->id();
            $table->string('transisi_no', 150)->nullable();
            $table->string('nik', 50)->nullable();
            $table->integer('jabatan_lama')->nullable();
            $table->integer('jabatan_baru')->nullable();
            $table->integer('eselon_lama')->nullable();
            $table->integer('eselon_baru')->nullable();
            $table->string('posisi_lama', 255)->nullable();
            $table->string('posisi_baru', 255)->nullable();
            $table->string('jenis_transisi', 50)->nullable();
            $table->date('tanggal_transisi_mulai')->nullable();
            $table->date('tanggal_transisi_akhir')->nullable();
            $table->integer('unit_kerja_lama')->nullable();
            $table->integer('unit_kerja_baru')->nullable();
            $table->string('no_sk', 50)->nullable();
            $table->date('tanggal_sk')->nullable();
            $table->string('file', 255)->nullable();
            $table->string('status_karyawan', 50)->nullable();
            $table->text('alasan')->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_karir');
    }
};
