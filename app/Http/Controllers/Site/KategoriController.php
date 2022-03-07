<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\UrunlerModel;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{

    public function index($url){

        $katGetir = KategorilerModel::all();

        $kategori = KategorilerModel::where("url",$url)->firstOrFail();

        $urunler  = UrunlerModel::whereIn("kategoriler_id",$kategori)->where("isActive",1)->paginate(10);

        $categories  = KategorilerModel::where('parent_id', '=', 0)->get();

        $toplamUrunSayisi = UrunlerModel::count();



        return view("tema.site.page.homepage.kategoriler", compact("kategori","katGetir","urunler","categories","toplamUrunSayisi"));

    }
}
