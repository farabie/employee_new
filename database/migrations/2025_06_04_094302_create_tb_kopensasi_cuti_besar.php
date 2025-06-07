<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_kopensasi_cuti_besar', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 35)->nullable();
            $table->integer('jumlah')->nullable();
            $table->tinyInteger('approve')->nullable();
            $table->date('tgl_pengajuan')->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kopensasi_cuti_besar');
    }
};
