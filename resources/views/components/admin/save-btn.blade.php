@props([
  'event',
  'title'       => 'Guardar',
  'updatedtext' => null,
  'newLine'     => false
])

<div class="row">
  <div class="col-md-12">
    <p>
      <button class="btn btn-primary pull-rigth" wire:click="{{ $event }}">
          {{ $title }}
      </button>
      @if ($newLine)
        <br />
      @endif
      @if ($updatedtext != null)
          <small class="text-muted @if (!$newLine) ml-3 @endif">Actualizdo el {{ $updatedtext }}</small>
      @endif

    </p>
  </div>
</div>