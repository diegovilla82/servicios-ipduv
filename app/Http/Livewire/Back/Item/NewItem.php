<?php

namespace App\Http\Livewire\Back\Item;

use App\Models\Item;
use Livewire\Component;

class NewItem extends Component
{
    public $item;

    protected $rules = [
        'item.nombre'   => 'required',
        'item.descripcion' => 'required',
        'item.user_id' => '',
    ];

    public function mount(){
        $this->item = new Item();
    }
    
    public function save_item(){
        
        $this->validate();
        
        Item::create([
            'nombre' => $this->item->nombre,
            'descripcion' => $this->item->descripcion,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('admin.item.index');

    }

    public function render()
    {
        return view('livewire.back.item.new-item');
    }
}
