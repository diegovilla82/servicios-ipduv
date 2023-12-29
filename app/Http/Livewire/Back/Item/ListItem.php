<?php

namespace App\Http\Livewire\Back\Item;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ListItem extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $filtro;

    public function render(){

        $items = Item::when($this->filtro, function ($query) {                
            return $query->where('nombre','LIKE','%'.$this->filtro.'%');
        })
        ->orderByDesc('created_at')
            ->paginate(4);

        return view('livewire.back.item.list-item',[
            'items' => $items
        ]);
    }
}
