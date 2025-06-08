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
        Schema::create('tb_struktur_organisasi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 20)->nullable();
            $table->string('unit_approval', 25)->nullable();
            $table->string('subsi_approval', 25)->nullable();
            $table->string('kasie_approval', 25)->nullable();
            $table->string('kadept_approval', 25)->nullable();
            $table->string('kadiv_approval', 25)->nullable();
            $table->string('direktorat_approval', 25)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_struktur_organisasi');
    }
};
