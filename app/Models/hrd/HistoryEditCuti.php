<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryEditCuti extends Model
{
    use HasFactory;
    protected $table = 'tb_history_edit_cuti';

    protected $fillable = [
        'jenis_edit_cuti',
        'jenis_tahun_cuti',
        'jenis_peg',
        'jumlah_cuti',
        'keterangan',
        'peg_cuti',
        'execute_by',
    ];
}
