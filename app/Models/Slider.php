<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

    use HasFactory;

    protected $table = "slider";

    public $timestamps = false;

    protected $primaryKey = "sliderid";

    protected $fillable = [
        'htmlcode',
        'imagen'
    ];
    protected function imagen():Attribute{
        return Attribute::make(get:fn($value)=>env("APP_URL").$value);
    }
}


