<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuotaCuti extends Model
{
    use HasFactory;
    protected $table = 'tb_pegawai';

    protected $fillable = [
        'jenis_cuti_ditambahkan',
        'jenis_peg',
        'jumlah_cuti',
    ];
}
