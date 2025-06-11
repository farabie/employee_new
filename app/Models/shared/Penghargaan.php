<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghargaan extends Model
{
    use HasFactory;
    protected $table = 'tb_penghargaan';
    protected $fillable = ['id_peg','nik', 'penghargaan', 'tahun', 'pemberi', 'file'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
