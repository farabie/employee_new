<?php

namespace App\Models\hrd;

use App\Models\shared\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontrakKaryawan extends Model
{
    use HasFactory;
    protected $table = 'tb_status_kontrak_karyawan';
    protected $fillable = [
        'id_peg','nik','status_kontrak', 'tgl_kontrak', 'kontrak_ke'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
