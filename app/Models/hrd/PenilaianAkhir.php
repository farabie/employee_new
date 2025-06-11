<?php

namespace App\Models\hrd;

use App\Models\shared\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianAkhir extends Model
{
    use HasFactory;
    protected $table = 'tb_penilaian_akhir';
    protected $fillable = ['id_peg', 'nik', 'nilai_pa', 'tahun_pa'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
