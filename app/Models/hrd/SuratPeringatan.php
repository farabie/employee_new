<?php

namespace App\Models\hrd;

use App\Models\shared\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPeringatan extends Model
{
    use HasFactory;
    protected $table = 'tb_surat_peringatan';
    protected $fillable = ['id_peg', 'nik', 'jenis_sp', 'periode_awal', 'periode_akhir','keterangan','file'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
