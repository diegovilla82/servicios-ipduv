<x-admin.card title="Listado de Items">
    @include('livewire.back.includes.search')
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>Fecha'</th>
                    <th>Area</th>
                    <th>Estado</th>
                    <th>Tecnico</th>
                    <th>Problema</th>
                    <th>Solucion</th>
                    <th>Dispositivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                <tr>
                    <td> {{ $service->created_at->format("d/m/Y") }} </td>
                    <td> {{ $service->device ? $service->device->area->descripcion : $service->area->descripcion }} </td>
                    <td> @include('livewire.back.includes.estado', ['estado' => $service->estado->descripcion]) </td>
                    <td> {{ $service->userAsigned ? $service->userAsigned->name : 'Sin asignar' }} </td>
                    <td> {{ $service->problema }} </td>
                    <td> {{ $service->solucion }} </td>
                    <td> {{ ($service->device) ? ($service->device->inventario) : 'Sin asignar' }} </td>
                    <td>
                        <a href="#" type="button" class="btn-sma btn-primary" wire:click="reporte({{$service->id}})"> <i class='fas fa-print'></i> </a>
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
