<?php

namespace App\Http\Livewire\Back\Device;

use App\Http\Traits\toast;
use App\Models\Area;
use App\Models\Device;
use App\Models\Device_type;
use App\Models\Service;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Livewire\Component;

class EditDevice extends Component
{
    use toast;
    public $device;
    public $user;
    public $deviceTypeSelected = 0;
    public $areaSelected = 0;

    protected $rules = [
        'device.descripcion' => '',
        'device.inventario' => 'required|integer|digits_between:4,6',
        'device.fecha_compra' => '',
        'device.cantidad' => '',
        'deviceTypeSelected' => '',
        'areaSelected' => '',
        'device.userAsigned' => '',

        'device.cpu' => '',
        'device.ram' => '',
        'device.motherboard' => '',
        'device.power_supply' => '',
        'device.drive' => '',
    ];

    public function mount(Device $device)
    {
        $this->device = $device;
        $this->deviceTypeSelected = $this->device->device_type_id;
        $this->areaSelected = $this->device->area_id;
    }

    public function save_device()
    {
        if (!$this->device->userAsigned) {
            $this->device->userAsigned = 'N/A';
        }
        $this->validate();
        $deviceOriginal = Device::firstWhere('inventario', $this->device->inventario);
        // VERIFICO QUE EL INVENTARIO QUE SE INGRESE NO EXITA Y QUE EL MISMO
        // NO SEA EL DEL REGISTRO ACTUAL
        if ($deviceOriginal->id != $this->device->id) {
            $this->toast('El numero de inventario seleccionado ya existe', 'error');
        } else {
            $this->device->device_type_id = $this->deviceTypeSelected;
            $this->device->area_id = $this->areaSelected;
            $this->device->save();

            $this->toast('Dispositivo Actualizado');
        }
    }

    public function delete_device()
    {
        $serviciosRelacionados = Service::where('device_id', $this->device->id)->get();

        foreach ($serviciosRelacionados as $key => $value) {
            $value->delete();
        }
        $this->device->delete();

        return redirect()->route('admin.device.index');
    }

    public function render()
    {
        $devicesTypes = Device_type::orderBy('descripcion')->pluck('descripcion', 'id');
        $areas = Area::orderBy('descripcion')->pluck('descripcion', 'id');

        $ruta = route('admin.device.services', $this->device->id);

        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create($ruta)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));
        $result = $writer->write($qrCode);

        $qr = '<img src="data:' . $result->getDataUri() . '" />';

        return view('livewire.back.device.edit-device', [
            'devicesTypes' => $devicesTypes,
            'areas' => $areas,
            'qr' => $qr,
        ]);
    }
}
