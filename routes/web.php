<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('components.sections.home.index');
});
