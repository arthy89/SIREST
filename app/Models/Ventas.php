<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $table = "ventas";

    public $timestamps = false;

    protected $primaryKey = "id_venta";

    protected $fillable = [
        'idpersona',
        'lista_venta',
        'tipodepago_venta',
        'total_venta',
        'vendedor_venta',
        'fecha_venta',
    ];
}
