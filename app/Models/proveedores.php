<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
    use HasFactory;
    protected $primaryKey = 'idprov'; 
    protected $fillable=['idprov','nom_prov','direccion','foto'];
}
