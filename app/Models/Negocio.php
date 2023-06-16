<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    use HasFactory;

    protected $table = "negocio";

    public $timestamps = false;

    protected $primaryKey = "id_neg";

    protected $fillable = [
        'neg_nombre',
        'neg_pais',
        'neg_direccion',
        'neg_cod',
        'neg_telefono',
        'neg_correo',
        'neg_garantia',
        'neg_img',
    ];
}
