<?php

namespace App\Http\Traits;

trait Toast {
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