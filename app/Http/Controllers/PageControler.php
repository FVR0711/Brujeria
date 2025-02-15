<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagina;
use Illuminate\Support\Facades\Cache;


class PageControler extends Controller
{
    public function getPage($path){

        $pagina = Cache::rememberForever($path, function () use ($path) {
            return Pagina::where("path",$path)->first();
        });

        if (is_null($pagina)) {
            return "No Se Encontró La Pagina";
        }


        return view('generalView',[
            "body"=>$pagina->body,
                ]);
    }

}
