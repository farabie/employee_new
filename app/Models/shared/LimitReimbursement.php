<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitReimbursement extends Model
{
    use HasFactory; 
    protected $table = 'tb_limit_reimbursement';

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
