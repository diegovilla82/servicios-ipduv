<?php

namespace App\Http\Livewire\Back\Item;

use App\Models\Item;
use Livewire\Component;

class EditItem extends Component
{
    public $item;

    protected $rules = [
        'item.nombre'   => 'required',
        'item.descripcion' => 'required',
        'item.user_id' => '',
    ];

    public function mount(Item $item){
        $this->item = $item;
    }

    

    public function save_item(){
        $this->validate();
        $this->item->save();
            
        $this->toast('Item Actualizado');
        
    }


    public function delete_item(){
        $this->item->delete();

        return redirect()->route('admin.item.index');
    }

    public function render()
    {
        return view('livewire.back.item.edit-item');
    }

    public  function toast($title, $icon = 'success'){
        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'timer'=>2000,
            'icon'=> $icon,
            'toast'=>true,
            'position'=>'top-right',
            'showConfirmButton' =>  false,
        ]);
      }
}
