<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Npwp extends Model
{
    use HasFactory;
    protected $table = 'tb_npwp';
    protected $primaryKey = 'id_npwp';

    protected $fillable = ['id_peg', 'nik', 'nomor_npwp', 'tanggungan', 'tgl_terdaftar', 'alamat','file'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
