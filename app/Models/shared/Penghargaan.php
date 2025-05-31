<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghargaan extends Model
{
    use HasFactory;
    protected $table = 'tb_penghargaan';
    protected $primaryKey = 'id_penghargaan';

    protected $fillable = ['nik', 'penghargaan', 'tahun', 'pemberi', 'file'];
}
