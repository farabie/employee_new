<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karir extends Model
{
    use HasFactory; 
    protected $table = 'tb_karir';
    protected $primaryKey = 'id';

    protected $fillable = ['transisi_no', 'nik', 'jabatan_lama', 'jabatan_baru', 'eselon_lama', 'eselon_baru', 
    'posisi_lama', 'posisi_baru', 'jenis_transisi', 'tanggal_transisi_mulai', 'tanggal_transisi_akhir', 'unit_kerja_lama',
    'unit_kerja_baru', 'no_sk', 'tanggal_sk', 'file', 'status_karyawan', 'alasan'];
}
