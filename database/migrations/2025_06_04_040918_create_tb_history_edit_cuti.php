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
        Schema::create('tb_history_edit_cuti', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_edit_cuti', 100)->nullable();
            $table->string('jenis_tahun_cuti', 100)->nullable();
            $table->string('jenis_peg', 20)->nullable();
            $table->integer('jumlah_cuti')->nullable();
            $table->string('keterangan', 255)->nullable();
            $table->string('peg_cuti', 255)->nullable();
            $table->string('execute_by', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_history_edit_cuti');
    }
};
