<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;
    
    protected $guarded=[];  //para que no se pueda agregar campos que no existan en la tabla
}
