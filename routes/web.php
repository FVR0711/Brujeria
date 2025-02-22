<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageControler;

Route::get('/', function () {
    return redirect('/amarres-de-amor');
});


Route::get("/sitemap.xml", [PageControler::class,"getSitemap"])->name("getSitemap");

Route::get('/{path}',[PageControler::class,"getPage"])->name("getPage");


