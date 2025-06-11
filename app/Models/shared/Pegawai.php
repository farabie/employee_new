<?php

namespace App\Models\shared;

use App\Models\hrd\Approval;
use App\Models\hrd\Jabatan;
use App\Models\hrd\Karir;
use App\Models\hrd\KontrakKaryawan;
use App\Models\hrd\PenilaianAkhir;
use App\Models\hrd\SuratPeringatan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'tb_pegawai';

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

    public function anak()
    {
        return $this->hasMany(Anak::class, 'id_peg');
    }

    public function approval()
    {
        return $this->hasOne(Approval::class, 'id_peg');
    }

    public function bank()
    {
        return $this->hasMany(Bank::class, 'id_peg');
    }

    public function bahasa()
    {
        return $this->hasMany(Bahasa::class, 'id_peg');
    }

    public function penilaianAkhir()
    {
        return $this->hasMany(PenilaianAkhir::class, 'id_peg');
    }

    public function pengalamanKerja()
    {
        return $this->hasMany(PengalamanKerja::class, 'id_peg');
    }

    public function izinPersonal()
    {
        return $this->hasMany(IzinPersonal::class, 'id_peg');
    }

    public function jabatan()
    {
        return $this->hasOne(Jabatan::class, 'id_peg');
    }

    public function karir()
    {
        return $this->hasMany(Karir::class, 'id_peg');
    }

    public function kopensasiCutiBesar()
    {
        return $this->hasOne(KopensasiCutiBesar::class, 'id_peg');
    }

    public function limitRembuisement()
    {
        return $this->hasOne(LimitReimbursement::class, 'id_peg');
    }

    public function limitRembuisementTahunLalu()
    {
        return $this->hasOne(LimitReimbursementTahunLalu::class, 'id_peg');
    }

    public function meetingRoom()
    {
        return $this->hasMany(MeetingRoom::class, 'id_peg');
    }

    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'id_peg');
    }

    public function npwp()
    {
        return $this->hasMany(Npwp::class, 'id_peg');
    }

    public function ortu()
    {
        return $this->hasMany(Ortu::class, 'id_peg');
    }

    public function pelatihan()
    {
        return $this->hasMany(Ortu::class, 'id_peg');
    }

    public function medical()
    {
        return $this->hasMany(Medical::class, 'id_peg');
    }

    public function spd()
    {
        return $this->hasMany(Spd::class, 'id_peg');
    }

    public function penghargaan()
    {
        return $this->hasMany(Penghargaan::class, 'id_peg');
    }

    public function sekolah()
    {
        return $this->hasMany(Pendidikan::class, 'id_peg');
    }

    public function sertifikasi()
    {
        return $this->hasMany(Sertifikasi::class, 'id_peg');
    }

    public function kontrakKaryawan()
    {
        return $this->hasMany(KontrakKaryawan::class, 'id_peg');
    }

    public function suamiIstri()
    {
        return $this->hasMany(KontrakKaryawan::class, 'id_peg');
    }

    public function suratPeringatan()
    {
        return $this->hasMany(SuratPeringatan::class, 'id_peg');
    }

    public function strukturOrganisasi()
    {
        return $this->hasOne(StrukturOrganisasi::class, 'id_peg');
    }

    public function hakAksesPegawai()
    {
        return $this->hasOne(HakAksesPegawai::class, 'id_peg');
    }
}
