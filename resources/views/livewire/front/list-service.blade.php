<div wire:poll.60000ms>
<x-admin.card title="Servicios pendientes">
@include('livewire.back.includes.radio')

<font size="4.5">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>Creado</th>
                <th>Dispositivo</th>
                <th>Area</th>
                <th>Problema</th>
                <th>Tecnico asignado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
            <tr>
                <td> {{ $service->created_at->format('d/m/y H:i:s') }} </td>
                <td> {{ $service->device->inventario}} </td>
                <td> {{ $service->device->area->descripcion}} </td>
                <td> {{ $service->problema }} </td>
                <td> {{ $service->userAsigned->name }}</td>
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
    </font>
</x-admin.card>
</div>
