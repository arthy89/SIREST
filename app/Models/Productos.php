<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = "producto";

    public $timestamps = false;

    protected $primaryKey = "idproducto";

    protected $fillable = [
        'categoriaid',
        'codigo',
        'nombre',
        'descripcion',
        'precio_compra',
        'precio_venta_mayor',
        'precio_venta_public',
        'colores',
        'tags',
        'stock',
        'imagen',
        'status'

    ];
}
