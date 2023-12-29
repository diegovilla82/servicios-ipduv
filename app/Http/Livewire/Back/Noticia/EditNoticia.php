<?php

namespace App\Http\Livewire\Back\Noticia;

use App\Models\Noticia;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditNoticia extends Component
{
    use WithFileUploads;

    public $noticia;
    public $imagen;
    public $imagen_vieja;

    public function mount(Noticia $noticia){
        $this->noticia = $noticia;
        $this->imagen = $noticia->imagen;
    }

    protected $rules = [
        'noticia.titulo'   => 'required',
        'noticia.resumen' => 'required',
        'noticia.contenido' => 'required',
        'imagen'           => 'image|nullable'
    ];

    public function save_noticia(){
        $this->validate();
        $this->noticia->save();
            
        if ($this->imagen) {
            if($this->imagen_vieja) Storage::delete($this->imagen_vieja);
            $imagen_url = $this->imagen->store('uploads/noticias');
            $this->noticia->update(['imagen' => $imagen_url]);
            $this->noticia_vieja = $imagen_url;
            $this->reset('imagen');
        }

        $this->toast('Noticia Actualizada');
    }

    public function cambiar_estado(){
        $this->noticia->update([
            'publicado' => !$this->noticia->publicado
        ]);

        $this->toast(
            $this->noticia->publicado ? 'Noticia Publicada' : 'Noticia Despublicada',
            $this->noticia->publicado ? 'success' : 'error'
        );
    }

    public function delete_noticia(){
        $this->noticia->delete();
        if($this->noticia_vieja) Storage::delete($this->noticia_vieja);
        return redirect()->route('admin.articles.index');
    }

    
    public function delete_imagen(){
        Storage::delete($this->noticia->imagen);
        $this->noticia->update(['imagen' => null]);
        $this->imagen_vieja = null;
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

      public function render()
    {
        return view('livewire.back.noticia.edit-noticia');
    }
}
