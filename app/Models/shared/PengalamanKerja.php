<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    use HasFactory;
    protected $table = 'tb_history_kerja';

    protected $fillable = ['id_peg', 'nik', 'periode_start', 'periode_end', 'nama_perusahaan', 'jenis_usaha', 'alamat','posisi_awal','posisi_akhir','jumlah_karyawan','keterangan','file'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
