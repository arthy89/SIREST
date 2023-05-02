<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Persona extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = "client";

    protected $table = "persona";

    protected $primaryKey = 'idpersona';

    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'email',
        'password',
        'nit',
        'token',
        'status',
    ];

    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }
}
