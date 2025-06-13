<?php

namespace App\Models\hrd;

use App\Models\shared\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;
    protected $table = 'tb_approval';
    protected $fillable = ['id_peg','nik','nama','atasan1_general', 'atasan2_general', 'atasan1_spd', 'atasan2_spd', 'atasan1_ko'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }

    public function atasan1()
    {
        return $this->belongsTo(Pegawai::class, 'atasan1_general', 'nik'); 
    }

    public function atasan2()
    {
        return $this->belongsTo(Pegawai::class, 'atasan2_general', 'nik'); 
    }
}
