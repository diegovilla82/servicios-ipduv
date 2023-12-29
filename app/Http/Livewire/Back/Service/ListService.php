<?php

namespace App\Http\Livewire\Back\Service;


use App\Http\Traits\toast;
use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Livewire\Component;
use Livewire\WithPagination;

class ListService extends Component
{
    use toast;
    use WithPagination;
    public $servicePdf;
    public $pdfContent;
    public $filtro;
    protected $paginationTheme = 'bootstrap';

    public function reporte($id)
    {
        $fecha = \Carbon\Carbon::now();

        $servicios = Service::where('id', $id)->first();

        $this->pdfContent = [
            'servicio' => $servicios,
            'fecha' => $fecha,
        ];

        return response()->streamDownload(function () {
            $pdf = PDF::loadView('report/pdf', $this->pdfContent);
            echo $pdf->stream();
        }, 'Servicio numero ' . $id . '.pdf');
    }

    public function render()
    {

        $services = Service::when($this->filtro, function ($query) {
            return $query->where('devices.inventario', 'LIKE', '%' . $this->filtro . '%')
                ->orWhere('services.problema', 'LIKE', '%' . $this->filtro . '%');
        })
            ->leftJoin('devices', 'services.device_id', '=', 'devices.id')
            ->select('services.*')
            ->orderBy('services.estado_id')
            ->orderByDesc('services.created_at')
            ->paginate(15);

        return view(
            'livewire.back.service.list-service',
            ['services' => $services]
        );
    }
}
