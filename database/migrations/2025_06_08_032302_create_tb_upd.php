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
        Schema::create('tb_upd', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_spd', 25)->nullable();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 20)->nullable();
            $table->string('kategori', 20)->nullable();
            $table->string('wilayah', 25)->nullable();
            $table->string('zona', 5)->nullable();
            $table->integer('jml_hari')->nullable();
            $table->integer('upd_harian')->nullable();
            $table->integer('total_upd_harian')->nullable();
            $table->integer('upd_transportasi')->nullable();
            $table->integer('upd_bulanan')->nullable();
            $table->integer('grand_total')->nullable();
            $table->integer('revision_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_upd');
    }
};
