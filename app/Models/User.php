<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nik',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    // Override method untuk MD5 password
    public function getAuthPassword()
    {
        return $this->password;
    }
    
    // Method tambahan untuk validasi MD5
    public function validatePassword($password)
    {
        return md5($password) === $this->password;
    }
}
