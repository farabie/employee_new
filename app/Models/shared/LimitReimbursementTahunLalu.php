<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitReimbursementTahunLalu extends Model
{
    use HasFactory; 
    protected $table = 'tb_limit_reimbursement_tahun_lalu';
    protected $primaryKey = 'id';
}
