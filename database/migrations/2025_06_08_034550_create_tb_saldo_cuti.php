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
        Schema::create('tb_saldo_cuti', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peg');
            $table->string('nik', 20)->nullable();
            $table->integer('tahun')->nullable();
            $table->enum('jenis_cuti', ['tahunan', 'besar'])->default('tahunan');
            $table->integer('hak_cuti_awal')->default(0);
            $table->integer('sisa_cuti')->default(0);
            $table->date('expired_date')->nullable();
            $table->timestamps();

            $table->foreign('id_peg')->references('id')->on('tb_pegawai')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['id_peg', 'tahun', 'jenis_cuti']);
            $table->index(['id_peg', 'tahun']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_saldo_cuti');
    }
};
