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
        Schema::create('tb_npwp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peg')->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('nomor_npwp', 50)->nullable();
            $table->string('tanggungan', 5)->nullable();
            $table->date('tgl_terdaftar')->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('file', 100)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();

            $table->foreign('id_peg')->references('id')->on('tb_pegawai')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_npwp');
    }
};
