<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_cuti_bersama', function (Blueprint $table) {
            $table->id();
            $table->string('nama_cuti_bersama', 255)->nullable();
            $table->integer('lama_cuti')->nullable();
            $table->date('tanggal_cuti_bersama')->nullable();
            $table->string('code', 255)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_cuti_bersama');
    }
};
