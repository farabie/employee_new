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
        Schema::create('tb_master_all', function (Blueprint $table) {
            $table->id();
            $table->string('nama_value', 150)->nullable();
            $table->string('type_value', 100)->nullable();
            $table->string('keterangan', 100)->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tb_master_all');
    }
};
