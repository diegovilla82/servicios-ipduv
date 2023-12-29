<?php

namespace App\Http\Livewire\Front;

use App\Models\Service;
use Livewire\Component;
use App\Http\Traits\toast;
use Livewire\WithPagination;

class ListService extends Component
{
    use WithPagination, toast;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        // dump('hizo');
        $services = Service::where('estado_id', '!=', '2')
            ->orderByDesc('services.updated_at')
            ->paginate(15);

        return view('livewire.front.list-service',
            [ "services" => $services ]);

    }
}
