<?php

namespace App\Models\shared;

use App\Models\shared\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinPersonal extends Model
{
    use HasFactory;
    protected $table = 'tb_izin_personal';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string'; 

    public function atasan1Nama()
    {
        return $this->belongsTo(Pegawai::class, 'atasan1', 'id_peg');
    }
}
