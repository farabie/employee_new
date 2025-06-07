<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJabatan extends Model
{
    use HasFactory;
    protected $table = 'tb_masterjab';

    protected $fillable = ['nama_masterjab', 'kode_jabatan'];
}
