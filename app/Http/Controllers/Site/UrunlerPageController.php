<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Element;

class UrunlerPageController extends Controller{

    public function index($url){

        $katGetir = KategorilerModel::all();

        $urunDetayGetir  = UrunlerModel::where("url",$url)->where("isActive",1)->firstOrFail();

        $urunRandomGetir = UrunlerModel::inRandomOrder()->where("isActive",1)->limit(4)->get();

        $categories     = KategorilerModel::where('parent_id', '=', 0)->get();

        $toplamUrunSayisi = UrunlerModel::count();

        return view("tema.site.page.homepage.urun-detay", compact("urunDetayGetir","urunRandomGetir","katGetir","categories","toplamUrunSayisi"));

    }
}
