<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;
    protected $table = 'tb_anak';
    protected $fillable = ['id_peg', 'nik', 'nama', 'tmp_lhr', 'tgl_lhr', 'jk', 'pendidikan', 'pekerjaan', 'status_hub'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
