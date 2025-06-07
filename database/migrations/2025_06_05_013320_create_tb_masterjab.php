<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_masterjab', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jabatan', 50)->nullable();
            $table->string('nama_masterjab', 64)->nullable();
           $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_masterjab');
    }
};
