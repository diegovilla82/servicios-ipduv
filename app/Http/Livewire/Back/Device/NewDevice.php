<?php

namespace App\Http\Livewire\Back\Device;

use App\Models\Area;
use App\Models\Device;
use Livewire\Component;
use App\Http\Traits\toast;
use App\Models\Device_type;
use Illuminate\Support\Collection;

class NewDevice extends Component
{
    public $device, $user;
    public $deviceTypeSelected = 0, $areaSelected = 0;
    // public $isStored = 0;
    public $stateSelected = 0;

    protected $rules = [
        'device.descripcion' => '',
        // 'device.inventario' => 'required|integer|digits_between:4,6|unique:devices,inventario',
        'device.inventario' => 'required|integer|digits_between:4,6',
        'device.fecha_compra' => '',
        'device.cantidad' => '',
        'deviceTypeSelected' => '',
        'areaSelected' => '',
        'device.userAsigned' => '',
        'device.prefijoInventario' => '',

        'device.cpu' => '',
        'device.ram' => '',
        'device.motherboard' => '',
        'device.power_supply' => '',
        'device.drive' => '',
        // 'device.is_stored' => '',
        'device.state' => '',
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
        $this->device->state = $this->stateSelected;
        // $this->device->is_stored = $this->isStored;
    }

    public function render()
    {
        $devicesTypes = Device_type::orderBy('descripcion')->pluck('descripcion', 'id');

        return view('livewire.back.device.new-device', [
            'devicesTypes' => $devicesTypes,
            'areas' => Area::orderBy('descripcion')->pluck('descripcion', 'id'),
            // 'stored' => new Collection([0 => 'No', 1 => 'No']),
            'states' => new Collection([0 => 'Bueno', 1 => 'Malo']),
        ]);
    }

    public function save_device()
    {
        if (!$this->device->userAsigned) {
            $this->device->userAsigned = 'Sin asignar';
        }
        $this->validate();
        $device = Device::where('inventario', $this->device->inventario)
            ->where('prefijoInventario', $this->device->prefijoInventario)
            ->first();
        // dd($device);
        if ($device == null) {
            $this->device->device_type_id = $this->deviceTypeSelected;
            $this->device->area_id = $this->areaSelected;

            $this->device->state = $this->stateSelected;
            // $this->device->is_stored = $this->isStored;


            $this->device->save();
            $this->toast('El dispositivo se cargo con exitoso');
        } else {
            $this->toast('Ya existe un dispositivo con ese inventario y esa letra', 'error');
        }
    }
}
