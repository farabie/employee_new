<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiburNasional extends Model
{
    use HasFactory;
    protected $table = 'tb_libur';

    protected $fillable = ['nama_libur', 'tanggal_libur', 'code'];
}
