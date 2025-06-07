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
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 50)->nullable();
            $table->string('nip', 24)->nullable();
            $table->string('file_ktp', 255)->nullable();
            $table->string('sim', 25)->nullable();
            $table->string('file_sim', 255)->nullable();
            $table->string('nama', 100)->nullable();
            $table->string('tempat_lhr', 64)->nullable();
            $table->date('tgl_lhr')->nullable();
            $table->string('agama', 16)->nullable();
            $table->string('jk', 12)->nullable();
            $table->string('gol_darah', 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pegawai');
    }
};
