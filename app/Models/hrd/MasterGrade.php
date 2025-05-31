<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterGrade extends Model
{
    use HasFactory;
    protected $table = 'tb_masteresl';
    protected $primaryKey = 'id_masteresl';
}
