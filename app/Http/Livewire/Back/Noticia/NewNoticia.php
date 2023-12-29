<?php

namespace App\Http\Livewire\Back\Noticia;

use App\Models\Noticia;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewNoticia extends Component
{
    use WithFileUploads;
    public $noticia;
    public $imagen;

    protected $rules = [
        'noticia.titulo'   => 'required',
        'noticia.resumen' => 'required',
        'noticia.contenido' => 'required',
        'imagen'           => 'image|nullable'
    ];

    public function mount(){
        $this->noticia = new Noticia();
    }
    
    public function save_noticia(){
        
        $this->validate();
        $this->noticia->publicado = false;
        $this->noticia->save();
            
        if ($this->imagen) {
            $imagen_url = $this->imagen->store('uploads/noticias');
            $this->noticia->update(['imagen' => $imagen_url]);
            $this->reset('imagen');
        }

        return redirect()->route('admin.noticia.edit', $this->noticia->id);

    }
    
    public function render()
    {
        return view('livewire.back.noticia.new-noticia');
    }
}
