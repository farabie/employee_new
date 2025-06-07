<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_bahasa', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg');
            $table->string('nik', 50)->nullable();
            $table->string('jns_bhs', 32)->nullable();
            $table->string('bahasa', 32)->nullable();
            $table->string('kemampuan', 8)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_bahasa');
    }
};
