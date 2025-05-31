<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id_user', 'nama_user', 'password', 'hak_akses', 'id_peg', 'shocart', 'hris', 
    'ams', 'ams_synced', 'ams_sync_error', 'ims', 'ims_synced', 'ims_sync_error', 'aas', 'helpdesk', 'rms', 'dms', 'cp', 'id_role', 'aas_p', 'aas_c', 'aas_r'];
}
