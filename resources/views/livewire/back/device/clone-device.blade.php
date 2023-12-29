<div>
    <div class="row">
        <x-admin.input title="Inventario" model="inventario" required=true tabindex=1 classes="col-md-12"/>
    </div>
    <div class="row">
        <x-admin.input title="Descripcion" model="descripcion" required=true tabindex=2 classes="col-md-12"/>
    </div>

    <div class="row">
        <x-admin.select 
        id="areaSelect2"
        model="areaSelected" 
        title="Area:" 
        :values="$areas" 
        classes="col-md-12 js-example-basic-single" 
        tabindex=4
    />
    </div>
    <x-admin.save-btn event="cloneDevice" />
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

        $("#areaSelect2").select2({
            theme: "bootstrap",
            dropdownAutoWidth : true,
            width: 'auto'
        });

        $('#areaSelect2').on('change', function (e) {
            var data = $('#areaSelect2').select2("val");
            @this.set('areaSelected', data);
        });
    });
</script>
@endsection