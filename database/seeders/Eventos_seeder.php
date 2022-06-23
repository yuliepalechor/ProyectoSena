<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\facades\DB;

class Eventos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       DB::table('eventos')->insert([
        'nombre_evento'=>'evento1',
        'fecha_evento'=>'20/08/2015',
        'tipo_evento'=>'nanna',
        'comentarios_evento'=>'bien',
       ]);

       



    }
}
