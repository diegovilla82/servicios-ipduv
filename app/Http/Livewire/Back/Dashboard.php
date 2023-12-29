<?php

namespace App\Http\Livewire\Back;

use App\Models\Service;
use Livewire\Component;

class Dashboard extends Component
{

    public $services;

    public function mount(){
        $this->services    = Service::count();
    }

    public function render()
    {
        return view('livewire.back.dashboard');
    }
}
