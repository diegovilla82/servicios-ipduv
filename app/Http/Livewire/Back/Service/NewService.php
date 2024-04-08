<?php

namespace App\Http\Livewire\Back\Service;

use App\Models\User;
use App\Models\Device;
use App\Models\Estado;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\toast;

class NewService extends Component
{
    use toast;
    use WithFileUploads;
    public $service;
    public $file;
    public $estadoSelected;
    public $deviceSelected;
    public $userSelected;
    public $deviceIdModal;

    protected $rules = [
        'estadoSelected' => 'required|min:1',
        'service.problema' => 'required',
        'service.solucion' => '',
        'deviceSelected' => '',
        'service.user_id' => '',
        'file' => '',
        'service.entrega_baja' => '',
        'service.nombre_usuario' => '',
    ];

    public function save_service()
    {
        $this->estadoSelected ? '' : $this->toast('El campo estado es obligatorio, completeo', 'error') ;
        $this->validate();

    
        $service = Service::create([
            'estado_id' => $this->estadoSelected,
            'problema' => $this->service->problema,
            'solucion' => $this->service->solucion,
            'device_id' => $this->deviceSelected,
            'user_id' => $this->userSelected,
            'file' => 'file',
            'entega_baja' => $this->service->entega_baja,
            'usuario_asignado' => $this->service->usuario_asignado,
        ]);


        if ($this->file) {
            $original_name = $this->file->getClientOriginalName() . rand(5, 15);
            $filePath = 'uploads/servicios/ticket' . $this->service->id;
            $this->file->storeAs($filePath, $original_name);
            $service->file = $filePath . '/' . $original_name;
            $service->save();
        }
        // Si es llamado del modal debo redireccionar a la vista de servicios por dispositivo
        $this->deviceSelected = $this->deviceIdModal ? $this->deviceIdModal : $this->deviceSelected;
        if ($this->deviceIdModal) {
            return redirect()->route('admin.device.services', $this->deviceSelected);
        }

        return redirect()->route('admin.service.index');
    }

    public function mount($deviceIdModal = null)
    {
        $this->service = new Service();
        $this->deviceIdModal = $deviceIdModal;
    }

    public function render()
    {
        $estados = Estado::orderBy('descripcion')->pluck('descripcion', 'id');
        // $devices = Device::orderBy('descripcion')->pluck('inventario_descripcion','id');

        // $devices = Device::orderBy('inventario')->get()->pluck('inventario_descripcion', 'id');
        $devices = Device::select(
            DB::raw("CONCAT(descripcion,' - ',userAsigned) AS descripcion"),
            'id'
        )
            ->orderBy('descripcion', 'asc')
            ->pluck('descripcion', 'id');

        $users = User::orderBy('name')->pluck('name', 'id');

        // Si deviceIdModal tiene valor debo redireccionar a la vista del modal
        $vista = $this->deviceIdModal ? 'livewire.back.device.add-service' : 'livewire.back.service.new-service';

        return view($vista, [
            'estados' => $estados,
            'devices' => $devices,
            'users' => $users,
        ]);
    }
}
