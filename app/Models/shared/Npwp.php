<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Npwp extends Model
{
    use HasFactory;
    protected $table = 'tb_npwp';
    protected $primaryKey = 'id_npwp';

    protected $fillable = ['nik', 'nomor_npwp', 'tanggungan', 'tgl_terdaftar', 'alamat','file'];
}
