<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuamiIstri extends Model
{
    use HasFactory;
    protected $table = 'tb_suamiistri';
    protected $primaryKey = 'id_si';
    protected $fillable = ['id_user', 'nama', 'tmp_lhr', 'tgl_lhr', 'jk', 'pendidikan', 'pekerjaan', 'status_hub'];
}
