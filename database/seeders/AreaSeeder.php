<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidad = new Area();
        $entidad->descripcion = 'P.R.O.M.E.B.A';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Presidencia';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Vocalia 1';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Vocalia 2';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Direccion de gestion administrativa';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Direccion de relaciones institucionales';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Direccion de secretaria general';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Direccion de recursos humano';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Direccion de informatica';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Direccion de protocolo';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Direccion de recupero de fondos';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Direccion de recursos financieros';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Direccion de control de gestion';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Direccion de registro notarial';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Gerencia de operativa';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Gerencia de proyecto';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Gerencia de desarrollo urbano';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Gerencia socioeconomico';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Archivo general';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Archivo del interior';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Archivo de resistencia';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Archivo de financiera';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
         
        $entidad = new Area();
        $entidad->descripcion = 'Archivo de recursos humanos';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
    }
}
