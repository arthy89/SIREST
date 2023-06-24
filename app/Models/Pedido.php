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

        'personaid',
        'usuarioid',
        'fecha',
        'fecha_entrega',
        'monto',
        'impuesto',
        'adelanto',
        'costo_envio',
        'id_device',
        'imei',
        'contrasena',
        'status',
        'patron',
        'lista_pedido',
        'prioridad',
        'descripcion',

        // 'referenciacobro',
        // 'personaid',
        // 'usuarioid',
        // 'fecha',
        // 'costo_envio',
        // 'monto',
        // 'tipopagoid',
        // 'direccion_envio',
        // 'referencia',
        // 'id_device',
        // 'contrasena',
        // 'patron',
        // 'idtipopedido',
        // 'status',
    ];

    public function imagenes()
    {
        return $this->hasMany(Imagenes::class, 'idpedido');
    }
}
