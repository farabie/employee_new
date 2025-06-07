<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_gaji', function (Blueprint $table) {
            $table->id();
            $table->integer('gaji_pokok')->nullable();
            $table->integer('tunjangan_komunikasi')->nullable();
            $table->integer('tunjangan_transportasi')->nullable();
            $table->integer('tunjangan_jabatan')->nullable();
            $table->integer('tunjangan_harian')->nullable();
            $table->integer('tunjangan_fungsional')->nullable();
            $table->integer('tunjangan_pemakaian_kendaraan')->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tb_gaji');
    }
};
