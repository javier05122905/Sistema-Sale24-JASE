<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sugerencias extends Model
{
    use HasFactory;
    protected $primaryKey = 'ids'; 
    protected $fillable=['ids','sugerencia','idcl'];
}
