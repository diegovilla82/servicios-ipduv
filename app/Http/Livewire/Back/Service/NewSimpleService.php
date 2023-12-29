<?php

namespace App\Http\Livewire\Back\Service;

use App\Models\Area;
use App\Models\User;
use App\Models\Service;
use Livewire\Component;

class NewSimpleService extends Component
{
    public $service;
    public $areaSelected;
    public $userSelected;
    protected $rules = [
        'service.problema' => 'required',
        'service.user_id' => '',
        'areaSelected' => '',
    ];

    public function save_service()
    {
        $this->validate();

        Service::create([
            'estado_id' => 1,
            'problema' => $this->service->problema,
            'user_id' => $this->userSelected,
            'area_id' => $this->areaSelected,
            'usuario_asignado' => $this->service->usuario_asignado,
        ]);

        return redirect()->route('admin.service.index');
    }

    public function mount()
    {
        $this->service = new Service();
    }

    public function render()
    {

        return view('livewire.back.service.new-simple-service', [
            'users' => User::orderBy('name')->pluck('name', 'id'),
            'areas' => Area::orderBy('descripcion')->pluck('descripcion', 'id')
        ]);
    }
}
