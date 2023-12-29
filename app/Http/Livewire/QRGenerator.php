<?php

namespace App\Http\Livewire;

use App\Models\Device;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Livewire\Component;

class QRGenerator extends Component
{
    public $device;

    public function mount(Device $device)
    {
        $this->device = $device;
    }

    public function render()
    {
        $ruta = route('admin.device.services', $this->device->id);
        $writer = new PngWriter();

        $qrCode = QrCode::create($ruta)
        ->setEncoding(new Encoding('UTF-8'))
        ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
        ->setSize(220)
        ->setMargin(10)
        ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
        ->setForegroundColor(new Color(0, 0, 0))
        ->setBackgroundColor(new Color(255, 255, 255));
        $result = $writer->write($qrCode);

        return '<img src="data:'.$result->getDataUri().'" />';

        return view('livewire.q-r-generator');
    }
}
