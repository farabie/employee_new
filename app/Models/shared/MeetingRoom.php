<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingRoom extends Model
{
    use HasFactory; 
    protected $table = 'tb_meeting_room';
    protected $primaryKey = 'id_booking';
}
