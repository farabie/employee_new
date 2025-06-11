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
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 50)->nullable();
            $table->string('nip', 24)->nullable();
            $table->string('file_ktp', 255)->nullable();
            $table->string('sim', 25)->nullable();
            $table->string('file_sim', 255)->nullable();
            $table->string('nama', 100)->nullable();
            $table->string('tempat_lhr', 64)->nullable();
            $table->date('tgl_lhr')->nullable();
            $table->string('agama', 16)->nullable();
            $table->string('jk', 12)->nullable();
            $table->string('gol_darah', 2)->nullable();
            $table->string('status_nikah', 16)->nullable();
            $table->string('status_kepeg', 8)->nullable();
            $table->date('tgl_kontrak')->nullable();
            $table->integer('kontrak_ke')->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('alamat_domisili', 255)->nullable();
            $table->string('telp', 16)->nullable();
            $table->string('email', 64)->nullable();
            $table->string('email_secondary', 64)->nullable();
            $table->integer('unit_kerja')->nullable();
            $table->integer('id_departement')->nullable();
            $table->string('foto')->nullable();
            $table->date('tgl_pensiun')->nullable();
            $table->date('date_reg')->nullable();
            $table->string('lok_kerja', 100)->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->string('company', 12)->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->string('status_karyawan', 15)->nullable();
            $table->string('jenis_peg', 30)->nullable();
            $table->string('nomor_kk', 25)->nullable();
            $table->string('file_kk', 255)->nullable();
            $table->string('nomor_paspor', 25)->nullable();
            $table->string('file_paspor', 25)->nullable();
            $table->date('masa_berlaku_paspor')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->decimal('berat_badan', 3, 0)->nullable();
            $table->string('lensa_kacamata', 255)->nullable();
            $table->string('ukuran_baju', 10)->nullable();
            $table->integer('ukuran_sepatu')->nullable();
            $table->string('kontak_darurat1', 20)->nullable();
            $table->string('nama_kontak_darurat1', 150)->nullable();
            $table->string('hub_kontak_darurat1', 50)->nullable();
            $table->string('kontak_darurat2', 20)->nullable();
            $table->string('nama_kontak_darurat2', 150)->nullable();
            $table->string('hub_kontak_darurat2', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pegawai');
    }
};
