<x-admin.base title="Editar Servicio">
  <x-admin.back-btn route="admin.service.index" />
  <div class="row">
    <div class="col-md-12">
      <livewire:back.service.edit-service :service='request()->id'>
    </div>
</div>
</x-admin>