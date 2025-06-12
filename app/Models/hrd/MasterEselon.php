<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterEselon extends Model
{
    use HasFactory;
    protected $table = 'tb_masteresl';
    protected $fillable = ['nama_masteresl', 'execute_by'];
}
