<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPeringatan extends Model
{
    use HasFactory;
    protected $table = 'tb_surat_peringatan';
    protected $primaryKey = 'id_sp';

    protected $fillable = ['nik', 'jenis_sp', 'periode_awal', 'periode_akhir','keterangan','file'];
}
