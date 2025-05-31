<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianAkhir extends Model
{
    use HasFactory;
    protected $table = 'tb_penilaian_akhir';
    protected $primaryKey = 'id_pa';

    protected $fillable = ['nik', 'nilai_pa', 'tahun_pa'];
}
