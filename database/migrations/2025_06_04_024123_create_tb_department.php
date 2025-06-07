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
        Schema::create('tb_department', function (Blueprint $table) {
            $table->id();
            $table->string('nama_department', 100);
            $table->string('keterangan', 150)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_department');
    }
};
