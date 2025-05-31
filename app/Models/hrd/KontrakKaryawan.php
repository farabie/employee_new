<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontrakKaryawan extends Model
{
    use HasFactory;
    protected $table = 'tb_status_kontrak_karyawan';
    protected $primaryKey = 'id_kontrak';

    protected $fillable = [
        'nik','status_kontrak', 'tgl_kontrak', 'kontrak_ke'
    ];
}
