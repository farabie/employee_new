<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $table = 'tb_new_cuti';
    protected $primaryKey = 'id_cuti';

    public function pegawai() {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }

    public function pengganti() {
        return $this->belongsTo(Pegawai::class, 'pengganti_cuti');
    }

    public function atasan1() {
        return $this->belongsTo(Pegawai::class, 'atasan_1');
    }

    public function atasan2() {
        return $this->belongsTo(Pegawai::class, 'atasan_2');
    }
}
