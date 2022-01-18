<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;

class Search extends Controller{

    public function index(){

        if (strip_tags(trim($_GET["keyword"]!=""))){

            $keyword = strip_tags(trim($_GET["keyword"]));

            $urunleriGetir = UrunlerModel::where("title","like","%".$keyword."%")->paginate(5);

            return view("tema.site.page.homepage.index",compact("urunleriGetir"));

        } else {

            return redirect("/")->with("toast_warning","Lütfen Bir Arama Yapınız");

        }

    }


}
