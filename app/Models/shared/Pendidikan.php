<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table = 'tb_sekolah';
    protected $fillable = ['id_peg','nik', 'tingkat', 'nama_sekolah', 'lokasi', 'jurusan', 'tahun', 'ijazah', 'keterangan', 'file'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
