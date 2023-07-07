<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Productos extends Model
{
    use HasFactory;
    protected $table = "producto";
    public $timestamps = false;
    protected $primaryKey = "idproducto";
    protected $fillable = [
        'categoriaid',
        'proveedorid',
        'id_device',
        'codigo',
        'nombre_p',
        'descripcion',
        'stock',
        'precio_compra',
        'precio_venta_mayor',
        'precio_venta_public',
        'colores',
        'tags',
        'imagen'
    ];
    protected function imagen():Attribute{
        return Attribute::make(get:fn($value)=>env("APP_URL").$value);
    }
    protected function colores():Attribute{
        return Attribute::make(get:fn($value)=>explode(",",$value));
    }
    protected function tags():Attribute{
        return Attribute::make(get:fn($value)=>explode(",",$value));
    }
}
