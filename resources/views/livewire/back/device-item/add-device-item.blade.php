<div>
@include('livewire.back.includes.search')
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
            <tr>
                <td> {{ $item->nombre }} </td>
                <td> {{ $item->descripcion }} </td>
                <td> <button class="btn btn-primary btn-sm mx-auto float-left" type="button" wire:click="saveDeviceItem({{$item->id}})">Agregar</button> </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="callout callout-info">
                    <p>Todavia No hay items</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table> 
    <p>
        {{ $items->links() }}
    </p>
</div>