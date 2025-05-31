<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'tb_bank';
    protected $primaryKey = 'id_account';

    protected $fillable = ['nik', 'nomor_account', 'nama_bank', 'keterangan'];
}
