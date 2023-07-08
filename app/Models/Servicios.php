<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $table = "tipo_pedido";

    public $timestamps = false;

    protected $primaryKey = "id_tip_pedido";

    protected $fillable = [
        'nombre',
        'descripcion',
        'observaciones',
        'status'
    ];
}
