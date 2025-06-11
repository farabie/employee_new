<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutiBersama extends Model
{
    use HasFactory;
    protected $table = 'tb_cuti_bersama';

    protected $fillable = ['nama_cuti_bersama', 'lama_cuti','tanggal_cuti_bersama', 'code'];
}
