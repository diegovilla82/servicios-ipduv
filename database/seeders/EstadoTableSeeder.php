<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Estado::create([
            'descripcion' => 'En proceso'
        ]);

        Estado::create([
            'descripcion' => 'Resuelto'
        ]);
        
        Estado::create([
            'descripcion' => 'Sin resolver'
        ]);

    }
}
