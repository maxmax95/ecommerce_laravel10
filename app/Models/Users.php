<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
///auth
use Illuminate\Contracts\Auth\Authenticatable;
///
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
///verificar essas dependencias na aula 26 do curso de laravel
///2:20

class Users extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'id_role'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    ////Para tornar a tb users autenticavel foi necessario declarar esses metodos todos
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
