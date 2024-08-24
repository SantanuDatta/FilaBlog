<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('components.pages.home');
});

Route::get('/projects', function () {
    return view('components.pages.projects');
});

Route::get('/post', function () {
    return view('components.pages.post');
});

Route::get('/newsletter', function(){
    return view('components.pages.newsletter');
});
