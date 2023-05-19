<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $primaryKey = 'idpersona';
    use HasFactory;
    protected $fillable = [
        'nombres',
        'identificacion',
        'apellidos',
        'telefono',
        'email',
        'password',
        'direccionfiscal',
        'nit',
        'token',
        'status',
    ];
}
