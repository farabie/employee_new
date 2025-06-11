<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiKerja extends Model
{
    use HasFactory;
    protected $table = 'tb_master_lokasi_kerja';

    protected $fillable = ['nama_lok_kerja'];
}
