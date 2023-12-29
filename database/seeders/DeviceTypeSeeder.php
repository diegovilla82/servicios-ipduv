<?php

namespace Database\Seeders;

use App\Models\Device_type;
use Illuminate\Database\Seeder;

class DeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
$entidad = new Device_type();
        $entidad->descripcion = 'Computadora administrativa';
        if(Device_type::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
        
        $entidad = new Device_type();
        $entidad->descripcion = 'Computadora de diseño';
        if(Device_type::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }

        $entidad = new Device_type();
        $entidad->descripcion = 'Impresora';
        if(Device_type::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }

        $entidad = new Device_type();
        $entidad->descripcion = 'Escaner';
        if(Device_type::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }

        $entidad = new Device_type();
        $entidad->descripcion = 'Monitor';
        if(Device_type::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }

        $entidad = new Device_type();
        $entidad->descripcion = 'Switch';
        if(Device_type::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }

        $entidad = new Device_type();
        $entidad->descripcion = 'Notebook';
        if(Device_type::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }

        $entidad = new Device_type();
        $entidad->descripcion = 'Telefono';
        if(Device_type::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }

        $entidad = new Device_type();
        $entidad->descripcion = 'Celular';
        if(Device_type::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }

        $entidad = new Device_type();
        $entidad->descripcion = 'Camara';
        if(Device_type::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }

        $entidad = new Device_type();
        $entidad->descripcion = 'Television';
        if(Device_type::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }

        $entidad = new Device_type();
        $entidad->descripcion = 'Toner';
        if(Device_type::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }

        $entidad = new Device_type();
        $entidad->descripcion = 'Equipo de audio';
        if(Device_type::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }

    }
}
