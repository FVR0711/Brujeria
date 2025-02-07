<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageControler;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/{path}',[PageControler::class,"getPage"])->name("getPage");