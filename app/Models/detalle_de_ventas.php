<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_de_ventas extends Model
{
    use HasFactory;
    protected $primaryKey = 'idv'; 
    protected $fillable=['idv','idp','canti','precio'];
}
