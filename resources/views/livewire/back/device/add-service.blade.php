<div>
    <div class="row">
        <x-admin.textarea title="Problema" model="service.problema" required=true tabindex=2 classes="col-md-12"/>
    </div>

    <div wire:ignore class="row">
        <x-admin.select
            id="estadoSelect2"
            model="estadoSelected" 
            title="Estado:" 
            :values="$estados" 
            classes="col-md-12" 
            tabindex=3
        />
        </div>
        <div wire:ignore class="row">
        <x-admin.select 
            id="userSelect2"
            model="userSelected" 
            title="Tecnico:" 
            :values="$users" 
            classes="col-md-12" 
            tabindex=4
        />
    </div>

    @if($estadoSelected != 1)
    <div class="row">
        <x-admin.textarea title="Solucion" model="service.solucion" required=true tabindex=5 classes="col-md-12"/>
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
                theme: "bootstrap",
                dropdownAutoWidth : true,
                width: 'auto'
            });

            $("#estadoSelect2").select2({
                theme: "bootstrap",
                dropdownAutoWidth : true,
                width: 'auto'
            });


            $('#estadoSelect2').on('change', function (e) {
                var data = $('#estadoSelect2').select2("val");
                @this.set('estadoSelected', data);
            });
        });
    </script>
    @endsection


    <x-admin.save-btn event="save_service" />
        
</div>




