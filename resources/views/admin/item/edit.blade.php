<x-admin.base title="Editar Items">
  <x-admin.back-btn route="admin.item.index" />
  <div class="row">
    <div class="col-md-12">
      <livewire:back.item.edit-item :item='request()->id'>
    </div>
</div>
</x-admin>