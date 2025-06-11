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
        Schema::create('tb_promosi_demosi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg')->nullable();
            $table->integer('jns_promosi_demosi')->nullable();
            $table->integer('jabatan_promosi_demosi')->nullable();
            $table->string('posisi_promosi_demosi', 100)->nullable();
            $table->string('grade_promosi_demosi', 5)->nullable();
            $table->integer('unit_kerja_promosi_demosi')->nullable();
            $table->string('no_sk', 50)->nullable();
            $table->date('tanggal_sk')->nullable();
            $table->string('file', 150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_promosi_demosi');
    }
};
