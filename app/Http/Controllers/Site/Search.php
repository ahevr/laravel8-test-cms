<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;

class Search extends Controller{
    public function index(){
        if (strip_tags(trim($_GET["keyword"]!=""))){
            $katGetir      = KategorilerModel::all();
            $keyword = strip_tags(trim($_GET["keyword"]));
            $urunleriGetir = UrunlerModel::where("title","like","%".$keyword."%")->where('isActive', 1)->paginate(5);
            return view("tema.site.page.homepage.index",compact("urunleriGetir","katGetir"));
        } else {
            return redirect("/")->with("toast_warning","Lütfen Bir Arama Yapınız");
        }
    }
}
