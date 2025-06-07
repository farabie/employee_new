<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'tb_jabatan';
    // protected $primaryKey = 'id_jab';

    protected $fillable = [
        'id_peg', 'id_user', 'jabatan', 'eselon', 'posisi', 'tgl_sk', 'no_sk', 'file'
    ];
}
