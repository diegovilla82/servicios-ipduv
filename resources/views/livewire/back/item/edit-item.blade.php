<div class="row">
    <div class="col-md-9">
        <x-admin.card title="Datos del item">
            @include('livewire.back.item.form')
        </x-admin.card>
    </div>
    <div class="col-md-3">
        <x-admin.card title="Opciones">
            <x-admin.save-btn event="save_item" updatedtext="{{ $item->updated_at->format('d/m/y H:i:s') }}" newLine=true />
            <hr>
            <hr>
            <x-admin.delete-btn 
                :key="$item->id" 
                event="delete_item"  
                text="Desea eliminar el item: {{ $item->nombre }}"
            />
        </x-admin.card>
    </div>
</div>
