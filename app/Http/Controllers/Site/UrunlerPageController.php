<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Element;

class UrunlerPageController extends Controller{
    public function index($url){
        $x = UrunlerModel::where("url",$url)->count();
        if ($x > 0) {
            $urunDetayGetir = UrunlerModel::where("url",$url)->first();
            return view("tema.site.page.homepage.urun-detay", compact("urunDetayGetir"));
        } else {
            return redirect("/");
        }
    }
}
