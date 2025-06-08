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
        Schema::create('tb_selfservice_temporary', function (Blueprint $table) {
            $table->id();
            $table->string('no_request_ss', 25)->nullable();
            $table->integer('id_peg')->nullable();
            $table->string('nik', 20)->nullable();
            $table->string('tipe_ss', 50)->nullable();
            $table->string('file_ktp', 255)->nullable();
            $table->string('nomor_kk', 25)->nullable();
            $table->string('file_kk', 255)->nullable();
            $table->string('nomor_paspor', 25)->nullable();
            $table->string('file_paspor', 255)->nullable();
            $table->date('masa_berlaku_paspor')->nullable();
            $table->string('tipe_sim', 20)->nullable();
            $table->string('sim', 100)->nullable();
            $table->string('file_sim', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('alamat_domisili', 255)->nullable();
            $table->string('telp', 16)->nullable();
            $table->string('status_nikah', 16)->nullable();
            $table->string('email', 64)->nullable();
            $table->string('email_secondary', 64)->nullable();
            $table->string('gol_darah', 3)->nullable();
            $table->string('tinggi_badan', 3)->nullable();
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
            $table->integer('id_keluarga')->nullable();
            $table->string('nama_keluarga', 150)->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin', 30)->nullable();
            $table->string('pendidikan', 10)->nullable();
            $table->string('pekerjaan', 100)->nullable();
            $table->string('status_hubungan', 50)->nullable();
            $table->integer('id_npwp')->nullable();
            $table->string('nomor_npwp', 50)->nullable();
            $table->string('tanggungan', 5)->nullable();
            $table->date('tgl_terdaftar')->nullable();
            $table->string('alamat_npwp', 255)->nullable();
            $table->string('file_npwp', 100)->nullable();
            $table->integer('id_sekolah')->nullable();
            $table->string('tingkat', 16)->nullable();
            $table->string('nama_sekolah', 64)->nullable();
            $table->string('lokasi_sekolah', 32)->nullable();
            $table->string('jurusan', 32)->nullable();
            $table->string('tahun_sekolah', 5)->nullable();
            $table->string('ijazah', 2)->nullable();
            $table->string('keterangan_sekolah', 100)->nullable();
            $table->string('file_ijazah', 255)->nullable();
            $table->integer('id_history')->nullable();
            $table->date('periode_start')->nullable();
            $table->date('periode_end')->nullable();
            $table->string('nama_perusahaan', 50)->nullable();
            $table->string('jenis_usaha', 50)->nullable();
            $table->string('alamat_perusahaan', 250)->nullable();
            $table->string('posisi_awal', 100)->nullable();
            $table->string('posisi_akhir', 100)->nullable();
            $table->string('keterangan_perusahaan', 250)->nullable();
            $table->string('file_paklaring', 150)->nullable();
            $table->integer('id_pelatihan')->nullable();
            $table->string('jenis_pelatihan', 50)->nullable();
            $table->string('nama_pelatihan', 128)->nullable();
            $table->string('tempat_pelatihan', 32)->nullable();
            $table->string('penyelenggara', 64)->nullable();
            $table->date('tanggal_mulai_pelatihan')->nullable();
            $table->date('tanggal_selesai_pelatihan')->nullable();
            $table->string('nomor_sertifikat_pelatihan', 32)->nullable();
            $table->date('tanggal_sertifikat_pelatihan')->nullable();
            $table->string('file_sertifikat', 32)->nullable();
            $table->string('lainlain_pelatihan', 150)->nullable();
            $table->integer('id_penghargaan')->nullable();
            $table->string('penghargaan', 64)->nullable();
            $table->string('tahun_penghargaan', 4)->nullable();
            $table->string('pemberi', 64)->nullable();
            $table->string('file_penghargaan', 255)->nullable();
            $table->string('status_approval', 20)->nullable();
            $table->string('keterangan_reject', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_selfservice_temporary');
    }
};
