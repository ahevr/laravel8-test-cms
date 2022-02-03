<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller{

    public function index(){

        $categories       = KategorilerModel::where('parent_id', '=', 0)->get();

        $urunleriGetir    = UrunlerModel::where("isActive",1);

        $toplamUrunSayisi = UrunlerModel::count();

        if  (strip_tags(trim(request()->has('sort') && !empty(request()->get("sort"))))) {

            if (request()->get("sort")=="product_name_a_z"){
                $urunleriGetir->orderBy("id","Desc");

            } elseif (request()->get("sort")=="price_lowest"){
                $urunleriGetir->orderBy("toplam_fyt","Asc");

            }elseif (request()->get("sort")=="price_highest"){
                $urunleriGetir->orderBy("toplam_fyt","Desc");
            }
        }

        $urunleriGetir = $urunleriGetir->paginate(9);


        return view("tema.site.page.homepage.index",compact("urunleriGetir","categories","toplamUrunSayisi"));

    }


}
