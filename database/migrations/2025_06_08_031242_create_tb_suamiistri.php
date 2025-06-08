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
        Schema::create('tb_suamiistri', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 20)->nullable();
            $table->string('nama', 150)->nullable();
            $table->string('tmp_lhr', 64)->nullable();
            $table->date('tgl_lhr')->nullable();
            $table->string('jk', 12)->nullable();
            $table->string('pendidikan', 8)->nullable();
            $table->string('pekerjaan', 32)->nullable();
            $table->string('status_hub', 8)->nullable();
            $table->date('date_reg')->nullable();
            $table->string('file', 250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_suamiistri');
    }
};
