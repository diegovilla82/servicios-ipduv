@props([
  'event',
  'key',
  'type'    => null,
  'classes' => null,
  'title'   => 'Eliminar',
  'text'    => 'Desea eliminar este elemento?'

])
<div>
  <button type="button" class="btn btn-danger btn-primary {{ $classes }}" data-toggle="modal" data-target="#modal{{ $type == null ?  $key : $type . $key }}">
    {{ $title }}
  </button>
  <div class="modal fade" id="modal{{ $type == null ?  $key : $type . $key }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $type == null ?  $key : $type . $key }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal{{ $type == null ?  $key : $type . $key }}Label">Eliminar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ $text }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal"  wire:click="  {{ $type == null ? $event : $event.'('.$key.')' }}" >Eliminar</button>
        </div>
      </div>
    </div>
  </div>
</div>