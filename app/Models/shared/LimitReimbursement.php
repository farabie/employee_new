<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitReimbursement extends Model
{
    use HasFactory; 
    protected $table = 'tb_limit_reimbursement';
    protected $primaryKey = 'id';
}
