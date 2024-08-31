<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/projects', function () {
    return view('components.pages.projects');
});

Route::get('/post', function () {
    return view('components.pages.post');
});

Route::get('/newsletter', function () {
    return view('components.pages.newsletter');
});
