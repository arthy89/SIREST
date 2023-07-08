<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use HasFactory;

    protected $table = "imagen";

    public $timestamps = false;

    protected $primaryKey = "id";

    protected $fillable = [
        'idpedido',
        'img',
        'ruta',
    ];
}
