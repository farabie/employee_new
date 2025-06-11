<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitReimbursementTahunLalu extends Model
{
    use HasFactory; 
    protected $table = 'tb_limit_reimbursement_tahun_lalu';

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
