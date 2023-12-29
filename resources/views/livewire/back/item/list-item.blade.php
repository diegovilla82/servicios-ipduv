<x-admin.card title="Listado de Items">
@include('livewire.back.includes.search')
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th class="col-md-3">Nombre</th>
                <th class="col-md-9">Descripcion</th>
                <th> Acciones </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
            <tr>
                <td> {{ $item->nombre }} </td>
                <td> {{ $item->descripcion }} </td>
                <td> <a href="{{ route('admin.item.edit', $item->id) }}" type="button" class="btn-sm btn-primary"> <i class='fas fa-edit'></i>  </a> </td>
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
    @section('js')
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script>
</script>
@endsection
</x-admin.card>
