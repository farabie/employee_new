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
        Schema::create('tb_status_kontrak_karyawan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peg')->nullable();       
            $table->string('nik', 20)->nullable();
            $table->string('status_kontrak', 20)->nullable();
            $table->date('tgl_kontrak')->nullable();
            $table->integer('kontrak_ke')->nullable();
            $table->timestamps();

            $table->foreign('id_peg')->references('id')->on('tb_pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_status_kontrak_karyawan');
    }
};
