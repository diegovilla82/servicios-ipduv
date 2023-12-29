<?php

namespace App\Http\Livewire\Back\Device;

use App\Models\Area;
use App\Models\Device;
use Livewire\Component;
use App\Http\Traits\toast;
use App\Models\Device_type;

class NewDevice extends Component
{
    public $device, $user;
    public $deviceTypeSelected = 0, $areaSelected = 0;

    protected $rules = [
        'device.descripcion' => '',
        'device.inventario' => 'required|integer|digits_between:4,6|unique:devices,inventario',
        'device.fecha_compra' => '',
        'device.cantidad' => '',
        'deviceTypeSelected' => '',
        'areaSelected' => '',

        'device.cpu' => '',
        'device.ram' => '',
        'device.motherboard' => '',
        'device.power_supply' => '',
        'device.drive' => '',
    ];

    use toast;


    public function mount()
    {
        $area = Area::orderBy('descripcion')->first();
        $this->areaSelected = $area->id;

        $deviceType = Device_type::orderBy('descripcion')->first();
        $this->deviceTypeSelected = $deviceType->id;

        $this->user = Auth()->user();
        $this->device = new Device();
    }

    public function render()
    {
        $devicesTypes = Device_type::orderBy('descripcion')->pluck('descripcion', 'id');

        return view('livewire.back.device.new-device', [
            'devicesTypes' => $devicesTypes,
            'areas' => Area::orderBy('descripcion')->pluck('descripcion', 'id')
        ]);
    }

    public function save_device()
    {
        $this->validate();
        $this->device->device_type_id = $this->deviceTypeSelected;
        $this->device->area_id = $this->areaSelected;
        $this->device->save();

        $this->toast('El dispositivo se cargo con exitoso');
    }
}
