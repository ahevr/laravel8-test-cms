<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;

class Search extends Controller
{
    public function index(){

        if (strip_tags(trim($_GET["keyword"]!=""))){

            $keyword = strip_tags(trim($_GET["keyword"]));

            $data = UrunlerModel::where("title","like","%".$keyword."%")->paginate(5);

            return view("tema.admin.page.urunler.index",compact("data"));

        } else {

            return redirect("/admin/urunler")->with("toast_warning","Lütfen Bir Arama Yapınız");

        }

    }
}
