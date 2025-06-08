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
        Schema::create('tb_sekolah', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('tingkat', 16)->nullable();
            $table->string('nama_sekolah', 64)->nullable();
            $table->string('lokasi', 32)->nullable();
            $table->string('jurusan', 32)->nullable();
            $table->string('tahun', 5)->nullable();
            $table->string('ijazah', 2)->nullable();
            $table->string('keterangan', 100)->nullable();
            $table->string('status', 5)->nullable();
            $table->string('file', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_sekolah');
    }
};
