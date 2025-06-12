<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HakAksesPegawai extends Model
{
    use HasFactory;
    protected $table = 'tb_hak_akses_pegawai';
    protected $fillable = [
        'id_peg','nik', 'shocart', 'hris', 'ams', 'ams_synced', 
        'ams_sync_error', 'ims', 'ims_synced', 'ims_sync_error', 'aas', 'helpdesk', 'rms', 'dms', 'cp', 'id_role',
        'aas_p', 'aas_c', 'aas_r' 
    ];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_peg');
    }
}
