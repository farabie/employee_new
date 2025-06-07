<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahasa extends Model
{
    use HasFactory;
    protected $table = 'tb_bahasa';
    protected $primaryKey = 'id';

    protected $fillable = ['nik', 'jns_bhs', 'bahasa', 'kemampuan'];
}
