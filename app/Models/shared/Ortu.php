<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    use HasFactory;
    protected $table = 'tb_ortu';
    protected $primaryKey = 'id_ortu';
    protected $fillable = ['id_user', 'nama', 'tmp_lhr', 'tgl_lhr', 'jk', 'pendidikan', 'pekerjaan', 'status_hub'];
}
