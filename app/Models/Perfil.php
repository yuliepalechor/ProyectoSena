<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table='perfil'; //hace referencia al nombre de mi tabla//
    protected $fillable=[
        'nombre',
        'descripcion',//los campos de mitabla
        'telefono',
        'intereses', 
    ];
    
}
