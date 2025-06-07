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
        Schema::create('tb_jabatan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('jabatan', 64)->nullable();
            $table->string('eselon', 16)->nullable();
            $table->string('no_sk', 255)->nullable();
            $table->date('tgl_sk')->nullable();
            $table->date('tmt_jabatan')->nullable();
            $table->date('sampai_tgl')->nullable();
            $table->string('file', 255)->nullable();
            $table->string('status_jab', 5)->nullable();
            $table->string('jk_jab', 12)->nullable();
            $table->string('posisi', 50)->nullable();
            $table->integer('id_peg_child')->nullable();
            $table->string('posisi_column', 5)->nullable();
            $table->string('kode_promosi_demosi', 5)->nullable();
            $table->integer('id_history_jab')->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jabatan');
    }
};
