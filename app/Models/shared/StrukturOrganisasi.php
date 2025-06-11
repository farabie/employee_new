<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;
    protected $table = 'tb_struktur_organisasi';

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
