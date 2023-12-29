<?php

namespace App\Http\Livewire\Back\Noticia;

use App\Models\Noticia;
use Livewire\Component;
use Livewire\WithPagination;

class ListNoticia extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render(){

        $noticias = Noticia::orderByDesc('created_at')
            ->paginate(4);

        return view('livewire.back.noticia.list-noticia',[
            'noticias' => $noticias
        ]);
    }
    
}
