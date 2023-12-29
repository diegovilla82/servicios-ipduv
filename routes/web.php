<?php

use App\Http\Livewire\Front\ListService;
use App\Models\Device;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/servicios', ListService::class)->name('front.service.index');

Route::get('phpinfo', function () {
    phpinfo();
})->name('phpinfo');

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
})->name('home');

Route::get('/qrgenerator/{id}', function ($id) {
//    $device = Device::find($id);
//    $ruta = route('admin.device.edit', $device->id);
    // $ruta = 'https://defensordelpueblo.chaco.gob.ar/assets/files/biblioteca/informe_anual_2021.pdf';

    $writer = new PngWriter();
    // Create QR code
    $qrCode = QrCode::create('www.google.com')
    ->setEncoding(new Encoding('UTF-8'))
    ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
    ->setSize(300)
    ->setMargin(10)
    ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
    ->setForegroundColor(new Color(0, 0, 0))
    ->setBackgroundColor(new Color(255, 255, 255));
    $result = $writer->write($qrCode);

    echo '<img src="data:'.$result->getDataUri().'" />';
})->name('qrgenerator');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/qrgenerator/{id}', function ($id) {
    $writer = new PngWriter();

    // Create QR code
    $qrCode = QrCode::create('Data')
    ->setEncoding(new Encoding('UTF-8'))
    ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
    ->setSize(300)
    ->setMargin(10)
    ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
    ->setForegroundColor(new Color(0, 0, 0))
    ->setBackgroundColor(new Color(255, 255, 255));
    $result = $writer->write($qrCode);

    echo '<img src="data:'.$result->getDataUri().'" />';
})->name('qrgenerator');
