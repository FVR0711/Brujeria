<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagina;


class PageControler extends Controller
{
    public function getPage($path){
        $pagina = Pagina::where("path",$path)->first();
        if (is_null($pagina)) {
            return "No Se Encontró La Pagina";
        }


        return view('generalView',[
            "body"=>$pagina->body,
                ]);
    }

}
