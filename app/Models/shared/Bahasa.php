<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahasa extends Model
{
    use HasFactory;
    protected $table = 'tb_bahasa';
    protected $fillable = ['id_peg', 'nik', 'jns_bhs', 'bahasa', 'kemampuan'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
