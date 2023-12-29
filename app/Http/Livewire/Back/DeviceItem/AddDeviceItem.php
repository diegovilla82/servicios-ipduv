<?php

namespace App\Http\Livewire\Back\DeviceItem;

use App\Models\Item;
use App\Models\Device;
use Livewire\Component;

class AddDeviceItem extends Component
{
    public $device, $filtro;

    public function mount(Device $device)
    {
        $this->device = $device;
    }

    public function saveDeviceItem($itemId)
    {
        $this->device->items()->attach($itemId);

        return redirect()->route('admin.device.edit', $this->device->id);
    }

    public function render()
    {
        $items = Item::when($this->filtro, function ($query) {                
                return $query->where('nombre','LIKE','%'.$this->filtro.'%');
            })
            ->orderByDesc('nombre')
            ->paginate(4);
            
        return view('livewire.back.device-item.add-device-item', [
            'items' => $items
        ]);
    }
}
