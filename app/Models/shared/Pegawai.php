<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'tb_pegawai';
    protected $primaryKey = 'id_peg';

    protected $fillable = [
        'nik', 'nama', 'tempat_lhr', 'tgl_lhr', 'jk', 
        'agama', 'gol_darah', 'status_nikah', 'alamat', 'alamat_domisili',
        'telp', 'email', 'email_secondary', 'kontak_darurat1', 'nama_kontak_darurat1',
        'hub_kontak_darurat1', 'kontak_darurat2', 'nama_kontak_darurat2', 'hub_kontak_darurat2',
        'unit_kerja', 'id_departement', 'tanggal_masuk', 'lok_kerja', 'jenis_peg', 'tinggi_badan',
        'berat_badan', 'lensa_kacamata', 'ukuran_baju', 'ukuran_sepatu', 'nip', 'sim', 'company', 'status_kepeg' , 
        'unit_approval', 'subsi_approval', 'kasie_approval', 'kadept_approval', 'kadiv_approval',
        'direktorat_approval', 'ams_role', 'ams_location', 'ims_hirarki', 'status_karyawan', 'tgl_kontrak', 'foto', 'tanggal_keluar',
        'atasan_1', 'atasan_2', 'file_ktp', 'file_sim', 'hak_cuti_tahun_berjalan', 'hak_cuti_tahun_1', 'hak_cuti_tahun_2'
    ];
}
