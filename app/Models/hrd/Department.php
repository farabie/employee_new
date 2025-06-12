<?php

namespace App\Models\hrd;

use App\Models\shared\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'tb_department';
    protected $fillable = ['nama_department', 'execute_by'];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_departement');
    }
}
