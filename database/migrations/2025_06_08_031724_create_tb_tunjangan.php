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
        Schema::create('tb_tunjangan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 20)->nullable();
            $table->string('no_tunjangan', 32)->nullable();
            $table->date('tgl_tunjangan')->nullable();
            $table->string('jns_tunjangan', 32)->nullable();
            $table->string('penyedia_asuransi', 100)->nullable();
            $table->string('file', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tunjangan');
    }
};
