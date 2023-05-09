<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    use HasFactory;

    protected $table = "dispositivo";

    public $timestamps = false;

    protected $primaryKey = "id_device";

    protected $fillable = [
        'device_name',
        'device_mark'
    ];
}
