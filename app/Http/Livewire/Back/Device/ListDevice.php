<?php

namespace App\Http\Livewire\Back\Device;

use App\Models\Device;
use App\Models\Device_type;
use Livewire\Component;
use Livewire\WithPagination;

class ListDevice extends Component
{
    use WithPagination;

    public $filtro;
    public $deviceFilterSelected = 1;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $devices = Device::when($this->filtro, function ($query) {
            return $query->where('device_type_id', '=', $this->deviceFilterSelected)
                ->where('inventario', 'LIKE', '%'.$this->filtro.'%')
                ->orWhere('descripcion', 'LIKE', '%'.$this->filtro.'%')
            ;
        })
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('livewire.back.device.list-device', [
            'devices' => $devices,
            'devicesFilter' => Device_type::orderBy('descripcion')->pluck('descripcion', 'id'),
        ]);
    }
}
