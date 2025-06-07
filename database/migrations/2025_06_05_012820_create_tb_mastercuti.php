<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_mastercuti', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_cuti', 255)->nullable();
            $table->integer('jumlah_cuti')->nullable();
            $table->string('keterangan', 150)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_mastercuti');
    }
};
