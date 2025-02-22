<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagina;
use Carbon\Carbon;
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

    public function getSitemap(){
        $paginas = Pagina::all();
        $sitemap = "";

        foreach ($paginas as $key => $value) {
            $sitemap .= 
                "<url> \n
                    <loc>https://amarresdominiosyhechizos.com/" .$value->path. "</loc>
                    <lastmod>" . Carbon::parse($value->updated_at)->toAtomString() . "</lastmod>
                    <priority>0.80</priority>
                </url>";

        }

        return response("<?xml version=\"1.0\" encoding=\"UTF-8\"?>
                <urlset
                    xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
                    xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
                    xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9
                            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">

                " . $sitemap . "


                </urlset>",200)->header("Content-Type","application/xml");                

    }

}
