<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\facades\DB;


class perfil_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeders:nos permite rellenar nuestra base de datos
        //nombre
        DB::table('perfil')->insert([
            'nombre'=>'omar hernan',
            'descripcion'=>'jjj',
            'telefono'=>'jjj',
            'intereses'=>'bbbb',

    
    
    ]);
    }
}
