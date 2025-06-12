<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPosisi extends Model
{
    use HasFactory;
    protected $table = 'tb_master_posisi';

    protected $fillable = ['nama_posisi', 'execute_by'];
}
