<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    use HasFactory;
    protected $primaryKey = 'idem'; 
    protected $fillable=['idem','nom_em','cargo','telefono','salario','fecha_contrato'];
}
