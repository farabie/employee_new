<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_approval', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('nama', 255)->nullable();
            $table->string('atasan1_general', 25)->nullable();
            $table->string('atasan2_general', 25)->nullable();
            $table->string('atasan1_spd', 25)->nullable();
            $table->string('atasan2_spd', 25)->nullable();
            $table->string('atasan1_ko', 25)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_approval');
    }
};
