<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos_model extends Model
{
    use HasFactory;
    protected $table='Eventos';  //agregamos
    protected $fillable=[
        'nombre_evento',
        'fecha_evento',
        'tipo_evento',
        'comentarios_evento',

    ];         


    
}
