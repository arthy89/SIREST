<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Categorias extends Model
{
    use HasFactory;

    protected $table = "categoria";

    public $timestamps = false;

    protected $primaryKey = "idcategoria";

    protected $fillable = [
        'nombre',
        'descripcion',
        'ruta',
        'status'
    ];
    protected function ruta():Attribute{
        return Attribute::make(get:fn($value)=>env("APP_URL").$value);
    }


}
