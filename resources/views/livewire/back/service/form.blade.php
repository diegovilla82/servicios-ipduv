<div class="row">
    <x-admin.input title="Nro. de actuación" model="service.nro_act" classes="col"/>
    <x-admin.input title="Pedido por" model="service.remitente" classes="col"/>
</div>
<div wire:ignore class="row">
    <x-admin.select
        id="deviceSelect2"
        model="deviceSelected"
        required="true"
        noOpcion="Sin asignar"
        title="Dispositivo:"
        :values="$devices"
        classes="col-md-6"
        tabindex="1"
    />
    @error('deviceSelected') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="row">
    <x-admin.textarea title="Problema" model="service.problema" required=true tabindex=2 classes="col-md-12"/>
</div>

<div wire:ignore class="row">
    <x-admin.select
        id="estadoSelect2"
        model="estadoSelected"
        noOpcion="Sin asignar"
        title="Estado:"
        :values="$estados"
        classes="col-md-6"
        tabindex=3
    />
    @error('estadoSelected') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div wire:ignore class="row">
    <x-admin.select
        id="userSelect2"
        model="userSelected"
        noOpcion="Sin asignar"
        title="Tecnico:"
        :values="$users"
        classes="col-md-6 js-example-basic-single"
        tabindex=4
    />
</div>

<div class="row">
    <x-admin.checkbox value="5" title="Es entrega/baja?" model="service.entrega_baja" tabindex=5 classes="col-md-4"/>
</div>


@if($service->entrega_baja)
    <div class="row">
        <x-admin.input title="Nombre del usuario" model="service.nombre_usuario" required=false tabindex=6 classes="col-md-6"/>
    </div>
@endif

@if($estadoSelected == 2)
<div class="row">
    <x-admin.textarea title="Solucion" model="service.solucion" required=true tabindex=7 classes="col-md-12"/>
</div>
@endif

@if($service->file)
<div class="row">
    <a style="padding-left: 14px;" href="{{$service->file}}">Haga click para descargar el archivo adjunto</a>
</div>
@else
<div class="row">
    <x-front.file  model="file" tabindex=2 classes="col-md-12">
    </x-front.file>
</div>
@endif

@section('js')
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <link rel="stylesheet" href="{{ asset('assets/select2/estilo/select2-bootstrap.css') }}">
<script>
    $(document).ready(function() {


        $("#userSelect2").select2({
            theme: "bootstrap"
        });

        $("#deviceSelect2").select2({
            theme: "bootstrap"
        });

        $("#estadoSelect2").select2({
            theme: "bootstrap"
        });


        $('#estadoSelect2').on('change', function (e) {
            var data = $('#estadoSelect2').select2("val");
            @this.set('estadoSelected', data);
        });

        $('#userSelect2').on('change', function (e) {
            var data = $('#userSelect2').select2("val");
            @this.set('userSelected', data);
        });

        $('#deviceSelect2').on('change', function (e) {
            var data = $('#deviceSelect2').select2("val");
            @this.set('deviceSelected', data);
        });
    });
</script>
@endsection
