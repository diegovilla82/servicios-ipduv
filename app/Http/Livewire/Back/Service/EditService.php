<?php

namespace App\Http\Livewire\Back\Service;

use App\Models\User;
use App\Models\Device;
use App\Models\Estado;
use App\Models\Service;
use Livewire\Component;
use App\Http\Traits\toast;
use Illuminate\Support\Facades\DB;

class EditService extends Component
{
    use toast;
    public $service;
    public $estadoSelected;
    public $deviceSelected;
    public $userSelected;

    protected $rules = [
        'estadoSelected' => 'required',
        'service.problema' => 'required',
        'service.solucion' => '',
        'deviceSelected' => 'required',
        'service.user_id' => '',
        'service.entrega_baja' => '',
        'service.nombre_usuario' => '',
        'service.nro_act' => '',
        'service.remitente' => '',
    ];

    public function mount(Service $service)
    {
        $this->service = $service;
        $this->deviceSelected = $service->device_id;
        $this->estadoSelected = $service->estado_id;
        $this->userSelected = $service->user_id;
    }

    public function save_service()
    {
        if (!$this->deviceSelected) {
            $this->toast('Debe seleccionar el dispositivo al que pertenece el servicio para poder guardarlo', 'error');
        } else {
            $this->validate();
            $this->service->estado_id = $this->estadoSelected;
            $this->service->device_id = $this->deviceSelected;
            $this->service->user_id = $this->userSelected;
            $this->service->save();
            $this->toast('Servicio Actualizado');
        }
    }

    public function delete_service()
    {
        $this->service->delete();

        return redirect()->route('admin.service.index');
    }

    public function render()
    {
        $estados = Estado::orderBy('descripcion')->pluck('descripcion', 'id');
        $devices = Device::select(
            DB::raw("CONCAT(descripcion,' - ',userAsigned) AS descripcion"),
            'id'
        )
            ->orderBy('descripcion', 'asc')
            ->pluck('descripcion', 'id');
        // $devices = Device::orderBy('descripcion')->pluck('descripcion', 'id');
        $users = User::orderBy('name')->pluck('name', 'id');

        return view('livewire.back.service.edit-service', [
            'estados' => $estados,
            'devices' => $devices,
            'users' => $users,
        ]);
    }
}
