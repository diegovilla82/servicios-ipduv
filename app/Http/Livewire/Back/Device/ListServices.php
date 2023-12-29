<?php

namespace App\Http\Livewire\Back\Device;

use App\Models\Device;
use Livewire\Component;
use Livewire\WithPagination;

class ListServices extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $device;

    public function mount(Device $device)
    {
        $this->device = $device;
    }

    public function render()
    {
        return view('livewire.back.device.list-services');
    }
}
