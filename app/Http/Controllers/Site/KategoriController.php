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

        $urunler  = UrunlerModel::whereIn("kategori_id",$kategori)->paginate(10);

        return view("tema.site.page.homepage.kategoriler", compact("kategori","katGetir","urunler"));

    }
}
