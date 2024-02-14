<div class="row">
    <x-admin.input title="Inventario" model="device.inventario" required=true tabindex=1 classes="col-md-4" />
    <x-admin.input title="Letra" model="device.prefijoInventario" required=true tabindex=2 classes="col-md-2" />
    <x-admin.input title="Descripcion" model="device.descripcion" required=true tabindex=3 classes="col-md-6" />
</div>
<div class="row">
    <x-admin.input type="date" title="Fecha de compra" model="device.fecha_compra" required=true tabindex=4
        classes="col-md-6" />
    <x-admin.select model="deviceTypeSelected" title="Tipo de dispositivo:" :values="$devicesTypes" classes="col-md-6"
        tabindex=5 />
</div>
<div class="row">
    <x-admin.select model="areaSelected" title="Area:" :values="$areas" classes="col-md-6" tabindex=6 />

    <x-admin.input title="Usuario asignado" model="device.userAsigned" required=true classes="col-md-6" tabindex=7 />
</div>

<div class="row">
    {{-- <x-admin.select model="isStored" title="En deposito?:" :values="$stored" classes="col-md-6" tabindex=8 /> --}}
    @if ($areas[$areaSelected] == 'Deposito')
        <x-admin.select model="stateSelected" title="Estado en deposito:" :values="$states" classes="col-md-6"
            tabindex=9 />
    @endif

</div>

@if ($deviceTypeSelected == 1 || $deviceTypeSelected == 2)
    <div style="text-align: center;">
        <h3> Componentes</h3>
    </div>
    <div class="row">
        <x-admin.input title="CPU" model="device.cpu" tabindex=8 classes="col-md-12" />

        <x-admin.input title="Placa madre" model="device.motherboard" tabindex=9 classes="col-md-12" />

        <x-admin.input title="RAM" model="device.ram" tabindex=10 classes="col-md-12" />

        <x-admin.input title="Disco" model="device.drive" tabindex=11 classes="col-md-12" />

        <x-admin.input title="Fuente" model="device.power_supply" tabindex=12 classes="col-md-12" />
    </div>
@endif
