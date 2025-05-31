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

    // Set remember token name
    protected $rememberTokenName = 'session_token';

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'nik',
        'password',
        'session_token', // tambahkan ke fillable
    ];

    protected $hidden = [
        'password',
        'session_token',
    ];

    // Disable timestamps jika tidak ada created_at/updated_at
    public $timestamps = false;
    
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

    // Override remember token methods untuk memastikan session_token digunakan
    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }
}
