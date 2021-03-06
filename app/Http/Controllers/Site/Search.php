<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;

class Search extends Controller{

    public function index(){

        if (strip_tags(trim(\request("keyword")!=""))){

            $toplamUrunSayisi = UrunlerModel::count();

            $katGetir       = KategorilerModel::all();

            $categories     = KategorilerModel::where('parent_id', '=', 0)->get();

            $keyword        = strip_tags(trim(\request("keyword")));

            $urunleriGetir  = UrunlerModel::where("title","like","%".$keyword."%")->where('isActive', 1)->paginate(5);

            if (count($urunleriGetir) > 0){

                return view("tema.site.page.homepage.index",compact("urunleriGetir","katGetir","categories","toplamUrunSayisi"));

            } else {

                return view("errors.404");

            }

        } else {

            return redirect("/")->with("toast_warning","Lütfen Bir Arama Yapınız");

        }
    }
}
