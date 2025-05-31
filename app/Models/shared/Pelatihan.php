<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $table = 'tb_pelatihan';
    protected $primaryKey = 'id_pelatihan';
    protected $fillable = ['nik', 'jenis_pelatihan', 'sertifikat_kompetensi', 'nama_pelatihan', 'tempat_pelatihan', 'penyelenggara', 'tanggal_mulai_pelatihan', 'tanggal_selesai_pelatihan', 'nomor_sertifikat_pelatihan', 'tanggal_sertifikat_pelatihan','lainlain_pelatihan','file_sertifikat'];
}
