<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi', 50)->nullable();
            $table->string('url_image', 50)->nullable();
            $table->string('keterangan', 250)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_organisasi');
    }
};
