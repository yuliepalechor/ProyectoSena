<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       // $this->call(perfil_seeder::class);
      //  $this->call(productos_seeder::class);
       // $this->call(perfil_seeder::class);
        $this->call(Eventos_seeder::class);

    }
}
