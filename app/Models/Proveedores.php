<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class proveedores extends Model
{
    use HasFactory;

    protected $table = "proveedor";

    public $timestamps = false;

    protected $primaryKey = "id_proveedor";

    protected $fillable = [
        'nombre_proveedor',
    ];
}
