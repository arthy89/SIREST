<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = "pedido";

    public $timestamps = false;

    protected $primaryKey = "idpedido";

    protected $fillable = [
        'referenciacobro',
        'personaid',
        'usuarioid',
        'fecha',
        'costo_envio',
        'monto',
        // 'tipopagoid',
        'direccion_envio',
        'referencia',
        'id_device',
        'contrasena',
        'patron',
        'idtipopedido',
        'status',
    ];
}
