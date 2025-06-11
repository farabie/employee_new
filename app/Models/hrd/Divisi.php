<?php

namespace App\Models\hrd;

use App\Models\shared\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table = 'tb_unit';
    protected $fillable = ['nama'];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'unit_kerja');
    }
}
