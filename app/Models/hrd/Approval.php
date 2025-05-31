<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;
    protected $table = 'tb_approval';
    protected $fillable = ['nik','nama','atasan1_general', 'atasan2_general', 'atasan1_spd', 'atasan2_spd', 'atasan1_ko'];
}
