<div class="row">
    <div class="col-md-9">
        <x-admin.card title="Datos del dispositivo">
            @include('livewire.back.device.form')
        </x-admin.card>
    </div>
    <div class="col-md-3">
        <x-admin.card title="Opciones">
            <x-admin.save-btn event="save_device" />
        </x-admin.card>
    </div>
</div>
