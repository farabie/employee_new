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
        Schema::create('tb_hak_akses_pegawai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peg')->nullable();
            $table->string('nik', 20)->nullable();
            $table->integer('hris')->nullable();
            $table->integer('aas')->nullable();
            $table->integer('aas_p')->nullable();
            $table->integer('aas_c')->nullable();
            $table->integer('aas_r')->nullable();
            $table->integer('id_role')->nullable();
            $table->integer('ams')->nullable();
            $table->integer('ams_synced')->nullable();
            $table->string('ams_sync_error', 255)->nullable();
            $table->integer('ims')->nullable();
            $table->integer('ims_synced')->nullable();
            $table->string('ims_sync_error', 255)->nullable();
            $table->integer('helpdesk')->nullable();
            $table->integer('das')->nullable();
            $table->integer('rms')->nullable();
            $table->integer('dms')->nullable();
            $table->integer('cms')->nullable();
            $table->integer('shocart')->nullable();
            $table->timestamps();

            $table->foreign('id_peg')->references('id')->on('tb_pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_hak_akses_pegawai');
    }
};
