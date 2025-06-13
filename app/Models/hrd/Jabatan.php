<?php

namespace App\Models\hrd;

use App\Models\shared\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'tb_jabatan';

    protected $fillable = [
        'id_peg', 'nik', 'jabatan', 'eselon', 'posisi', 'tgl_sk', 'no_sk', 'file'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }

    public function masterJabatan() {
        return $this->belongsTo(MasterJabatan::class, 'jabatan', 'id');
    }
}
