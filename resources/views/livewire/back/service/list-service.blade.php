<x-admin.card title="Listado de Items">
@include('livewire.back.includes.search')
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th></th>
                <th>Fecha</th>
                <th>Area</th>
                <th>Propietario</th>
                <th>Problema</th>
                <th>Tecnico</th>
                <th>Inventario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
            <tr>
                <td> {!! $service->getEstado() !!}</td>
                <td> {{ $service->created_at->format("d/m/Y") }} </td>
                <td> {{ isset($service->device) ? $service->device->area->descripcion : 'Sin asignar' }} </td>
                <!-- <td> {{ isset($service->area) ? $service->area->descripcion : 'Sin asignar' }} </td> -->
                @if(isset($service->device))
                    <td> {{ $service->device->userAsigned ? $service->device->userAsigned : 'Sin asignar' }} </td>
                @else
                <td> Sin asignar </td>
                @endif
                <td> {{ $service->problema }} </td>
                <td> {{ $service->userAsigned ? $service->userAsigned->name : 'Sin asignar' }} </td>
                <td> {{ ($service->device) ? ($service->device->inventario) : 'Sin asignar' }} </td>
                <td>
                    <a href="#" type="button" class="btn-sm btn-primary" wire:click="reporte({{$service->id}})"> <i class='fas fa-print'></i> </a>
                    <a href="{{ route('admin.service.edit', $service->id) }}" type="button" class="btn-sm btn-primary"> <i class='fas fa-edit'></i>  </a>
                    <a href="{{ route('admin.device.services', $service->id) }}" type="button" class="btn-sm btn-primary"> <i class='fas fa-search'></i>  </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="callout callout-info">
                    <p>Todavia no hay servicios</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <p>
        {{ $services->links() }}
    </p>
</x-admin.card>
