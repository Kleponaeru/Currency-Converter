<?php

use App\Http\Controllers\ConverterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});
Route::get('/converter', function () {
    return view('form-converter.converter');
});
Route::post('/convert', [ConverterController::class, 'convert'])->name('convert');

Route::fallback(function () {
    return response()->view('404', [], 404);
});

