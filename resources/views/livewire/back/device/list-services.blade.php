<x-admin.card title="Servicios para este dispositivo">
    <x-front.modal key="AddService" classes="btn-primary btn-sm float-right" title="Agregar servicio">
        <livewire:back.service.new-service :deviceIdModal='request()->id'>
    </x-front>
    <br>
    <br>

    @if($device->services)
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Problema</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($device->services as $service)
            <tr>
                <td> @include('livewire.back.includes.estado', ['estado' => $service->estado->descripcion]) </td>
                <td> {{ $service->problema }} </td>
                <td>
                    <a href="#" type="button" class="btn-sm btn-primary" wire:click="reporte({{$service->id}})"> <i class='fas fa-print'></i>  </a> 
                    <a href="{{ route('admin.service.edit', $service->id) }}" type="button" class="btn-sm btn-primary"> <i class='fas fa-edit'></i>  </a> 
                    <a href="{{ route('admin.device.services', $service->id) }}" type="button" class="btn-sm btn-primary"> <i class='fas fa-search'></i>  </a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    @else
    <tr>
        <td colspan="4">
            <div class="callout callout-info">
            <p>Todavia no hay servicios</p>
            </div>
        </td>
    </tr>
    @endif
</x-admin.card>
