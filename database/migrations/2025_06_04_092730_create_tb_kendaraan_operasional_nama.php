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
        Schema::create('tb_kendaraan_operasional_nama', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat_kendaraan_operasional', 30)->nullable();
            $table->string('nama', 255)->nullable();
            $table->string('divisi_instansi', 100)->nullable();
            $table->string('jenis_karyawan', 100)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kendaraan_operasional_nama');
    }
};
