<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KendaraanOperasional extends Model
{
    use HasFactory; 
    protected $table = 'tb_kendaraan_operasional';
    protected $primaryKey = 'id_kendaraan_operasional';
}
