@if($estado == 'En proceso')
	<span class="badge badge-info">{{$estado}}</span>
@elseif($estado == 'Resuelto')
	<span class="badge badge-success">{{$estado}}</span>
@elseif($estado == 'Sin resolver')
      <span class="badge badge-danger">{{$estado}}</span>
	{{-- <span class="badge badge-warning">{{$estado}}</span> --}}
@endif