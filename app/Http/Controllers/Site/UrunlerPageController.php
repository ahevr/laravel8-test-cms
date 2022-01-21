<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Element;

class UrunlerPageController extends Controller{

    public function index($url){

        $urunDetayGetir  = UrunlerModel::where("url",$url)->where("isActive",1)->firstOrFail();
        $urunRandomGetir = UrunlerModel::inRandomOrder()->where("isActive",1)->limit(4)->get();
        return view("tema.site.page.homepage.urun-detay", compact("urunDetayGetir","urunRandomGetir"));

    }
}
