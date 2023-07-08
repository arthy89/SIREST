<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Promociones extends Model
{
    use HasFactory;
    protected $table = "promocion";
    public $timestamps = false;
    protected $primaryKey = "promocionid";
    protected $fillable = [
        'nombre_promocion',
        'fecha_inicio',
        'fecha_final',
        'idproducto',
        'tipo_descuento',
        'cantidad_descuento'
    ];
}
