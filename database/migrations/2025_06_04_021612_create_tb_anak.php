<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_anak', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peg');
            $table->string('nik', 16)->nullable();
            $table->string('id_user', 50)->nullable();
            $table->string('nama', 64)->nullable();
            $table->string('tmp_lhr', 64)->nullable();
            $table->date('tgl_lhr')->nullable();
            $table->string('jk', 12)->nullable();
            $table->string('pendidikan', 8)->nullable();
            $table->string('pekerjaan', 32)->nullable();
            $table->string('status_hub', 32)->nullable();
            $table->date('date_reg')->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tb_anak');
    }
};
