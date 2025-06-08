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
        Schema::create('tb_penghargaan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('penghargaan', 64)->nullable();
            $table->string('tahun', 4)->nullable();
            $table->string('pemberi', 64)->nullable();
            $table->string('file', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_penghargaan');
    }
};
