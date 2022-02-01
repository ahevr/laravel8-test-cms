<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;

class HomePageController extends Controller{

    public function index(){

        $categories       = KategorilerModel::where('parent_id', '=', 0)->get();

        $urunleriGetir    = UrunlerModel::where("isActive",1);

        $toplamUrunSayisi = UrunlerModel::count();

        if (isset($_GET["sort"]) && !empty($_GET["sort"])) {

            if ($_GET["sort"]=="product_name_a_z"){
                $urunleriGetir->orderBy("id","Desc");

            } elseif ($_GET["sort"]=="price_lowest"){
                $urunleriGetir->orderBy("toplam_fyt","Asc");

            }elseif ($_GET["sort"]=="price_highest"){
                $urunleriGetir->orderBy("toplam_fyt","Desc");
            }
        }
        $urunleriGetir = $urunleriGetir->paginate(10);


        return view("tema.site.page.homepage.index",compact("urunleriGetir","categories","toplamUrunSayisi"));

    }


}
