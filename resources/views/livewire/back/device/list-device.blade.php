<x-admin.card title="Listado de Dispositivos">
    <div class="row">
        <x-admin.select
            id="deviceSelect2"
            model="deviceFilterSelected"
            title="Dispositivo:"
            :values="$devicesFilter"
            classes="col-md-6"
            tabindex=1
        />
    </div>
@include('livewire.back.includes.search')
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>Inventario</th>
                <th>Descripcion</th>
                <th>Propietario</th>
                <th>Tipo de dispositivo</th>
                <th>Area</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($devices as $device)
            <tr>
                <td> {{ $device->inventario }} </td>
                <td> {{ $device->descripcion }} </td>
                @if(isset($device->userAsigned))
                    <td> {{ $device->userAsigned ? $device->userAsigned : 'N/A' }} </td>
                @else
                    <td> N/A </td>
                @endif
                <td> {{ $device->deviceType->descripcion }} </td>
                <td> {{ $device->area->descripcion }} </td>
                <td>
                    <a href="{{ route('admin.device.services', $device->id) }}" type="button" class="btn-sm btn-primary"> <i class='fas fa-edit'></i>  </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="callout callout-info">
                    <p>Todavia No hay dispositivos</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <p>
        {{ $devices->links() }}
    </p>
</x-admin.card>
