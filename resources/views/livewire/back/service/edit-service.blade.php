<div>
<div class="row">
    <div class="col-md-9">
        <x-admin.card title="Datos del servicio">
            @include('livewire.back.service.form')
        </x-admin.card>
    </div>
    <div class="col-md-3">
        <x-admin.card title="Opciones">
            <x-admin.save-btn event="save_service" updatedtext="{{ $service->updated_at->format('d/m/y H:i:s') }}" newLine=true />
            <hr>
            <x-admin.delete-btn 
                :key="$service->id" 
                event="delete_service"  
                text="Desea eliminar el servicio: {{ $service->descripcion }}"
            />
        </x-admin.card>
    </div>
</div>
</div>