<x-admin.card title="Items para este dispositivo">
    <x-front.modal key="AddItem" classes="btn-primary btn-sm float-right" title="Agregar componentes">
        <livewire:back.device-item.add-device-item :device='request()->id'>
    </x-front>
    <br>
    <br>

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
                
                <td>
                <x-admin.delete-btn 
                    :key="$item->id" 
                    type="item"  
                    event="deleteItemDevice"  
                    text="Desea eliminar el item: {{ $item->nombre }}"
                />
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="callout callout-info">
                    <p>Todavia No hay componentes cargados para este dispositivo</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table> 
    <p>
        {{-- {{ $items->links() }} --}}
    </p>
</x-admin.card>
