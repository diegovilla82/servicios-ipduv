<?php

namespace App\Models;

use App\Models\Area;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado_id',
        'problema',
        'solucion',
        'device_id',
        'user_id',
        'entrega_baja',
        'nombre_usuario',
        'area_id',
        'nro_act',
        'remitente'
    ];

    // 1 en proceso
    // 2 resuelto
    // 3 sin resolver
    public function getEstado()
    {
        $estado = $this->estado_id;
        $html = '';
        switch ($estado) {
            case 1:
                $icon = 'clock';
                $color = '';
                break;
            case 2:
                $icon = 'check-circle';
                $color = 'green';
                break;
            case 3:
                $icon = 'ban';
                $color = 'red';
                break;
        }
        return '<i class="fas fa-fw fa-' . $icon . ' "style="color:' . $color . '"  aria-hidden="true"></i>';
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id', 'id');
    }

    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id', 'id');
    }

    public function userAsigned()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }
}
