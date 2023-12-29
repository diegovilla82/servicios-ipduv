<?php

namespace App\Http\Livewire\Back\Device;

use App\Models\Area;
use App\Models\Device;
use Livewire\Component;
use App\Http\Traits\toast;

class CloneDevice extends Component
{
    use toast;
    public $clonedDevice, $device, $inventario, $descripcion, $areaSelected;

    protected $rules = [
        'descripcion' => '',
        'inventario' => 'required|integer|digits_between:4,6|unique:devices,inventario',
        'areaSelected' => 'required',
    ];

    public function mount(Device $device) {
        $area = Area::orderBy('descripcion')->first();
        $this->areaSelected = $area->id;
        
        $this->device = $device;

    }

    public function cloneDevice() {
        $this->clonedDevice = $this->device->replicate();
        
        $this->clonedDevice->inventario = $this->inventario;
        $this->clonedDevice->descripcion = $this->descripcion;
        $this->clonedDevice->area_id = $this->areaSelected;
        $this->clonedDevice->push();

        foreach ($this->device->items as $key => $item) {
            $this->clonedDevice->items()->attach($item);
        }
        $this->clonedDevice->save();
        $this->toast('Dispositivo clonado con exito');

    }
    
    public function render()
    {
        return view('livewire.back.device.clone-device', [
            'areas' => Area::orderBy('descripcion')->pluck('descripcion','id')
        ]);
    }
}
