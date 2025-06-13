<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoCuti extends Model
{
    use HasFactory;
    protected $table = 'tb_saldo_cuti';
    protected $fillable = [
        'id_peg','nik', 'tahun', 'jenis_cuti', 'hak_cuti_awal', 'sisa_cuti', 
        'status_saldo_cuti', 'expired_date'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
