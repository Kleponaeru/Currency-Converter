<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});
Route::get('/coverter', function () {
    return view('form-converter.converter');
});
