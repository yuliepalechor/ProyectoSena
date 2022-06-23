<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugares_model extends Model
{
    use HasFactory;

    protected $table='Lugares';  //agregamos
    protected $fillable=[
        'nombre',
        'direccion',
        'telefono',
        'correo',

    ];             
}
