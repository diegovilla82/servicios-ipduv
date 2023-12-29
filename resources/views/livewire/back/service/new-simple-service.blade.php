<div>
    <div class="row">
        <div class="col-md-9">
            <x-admin.card title="Datos del servicio">
                <div class="row">
                    <x-admin.textarea title="Problema" model="service.problema" required=true tabindex=1 classes="col-md-12"/>
                </div>
                <div wire:ignore class="row">
                    <x-admin.select
                        id="userSelect2"
                        model="userSelected"
                        noOpcion="probando"
                        title="Tecnico:"
                        :values="$users"
                        classes="col-md-6 js-example-basic-single"
                        tabindex=2
                    />
                </div>

                <div wire:ignore class="row">
                    <x-admin.select
                        id="areaSelect2"
                        model="areaSelected"
                        noOpcion="probando"
                        title="Area:"
                        :values="$areas"
                        classes="col-md-6 js-example-basic-single"
                        tabindex=3
                    />
                </div>
            </x-admin.card>
        </div>


        <div class="col-md-3">
            <x-admin.card title="Opciones">
                <x-admin.save-btn event="save_service" />
            </x-admin.card>
        </div>
    </div>

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

                $('#userSelect2').on('change', function (e) {
                    var data = $('#userSelect2').select2("val");
                    @this.set('userSelected', data);
                });

                $("#areaSelect2").select2({
                    theme: "bootstrap"
                });

                $('#areaSelect2').on('change', function (e) {
                    var data = $('#areaSelect2').select2("val");
                    @this.set('area\Selected', data);
                });

            });
        </script>
    @endsection
</div>
