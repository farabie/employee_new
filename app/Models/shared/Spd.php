<?php

namespace App\Models\shared;

use App\Models\shared\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spd extends Model
{
    use HasFactory;
    protected $table = 'tb_pengajuan_spd';

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
    
    public function atasan1Nama()
    {
        return $this->belongsTo(Pegawai::class, 'atasan1', 'id_peg');
    }

    public function atasan2Nama()
    {
        return $this->belongsTo(Pegawai::class, 'atasan2', 'id_peg');
    }
    
}
