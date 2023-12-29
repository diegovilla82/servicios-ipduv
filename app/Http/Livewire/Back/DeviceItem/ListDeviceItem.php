<?php

namespace App\Http\Livewire\Back\DeviceItem;

use App\Models\Device;
use DeviceItem;
use Livewire\Component;
use Livewire\WithPagination;

class ListDeviceItem extends Component
{
    use WithPagination;
    public $device;

    protected $paginationTheme = 'bootstrap';

    public function mount(Device $device)
    {
        $this->device = $device;
    }

    public function deleteItemDevice($itemId)
    {
        $this->device->items()->detach($itemId);
    }

    public function render()
    {
        $items = $this->device->items;

        return view('livewire.back.device-item.list-device-item', [
            'items' => $items
        ]);
    }
}
