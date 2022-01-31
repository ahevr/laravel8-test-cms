<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;

class Search extends Controller{

    public function index(){

        if (strip_tags(trim(\request("keyword")!=""))){

            $ayar = AyalarModel::all()->first();

            $keyword        = strip_tags(trim(\request("keyword")));

            $data = UrunlerModel::where("title","like","%".$keyword."%")->paginate(5);

            if (count($data) > 0){

                return view("tema.admin.page.urunler.index",compact("data","ayar"));

            } else {

                return view("errors.404");
            }

        } else {

            return redirect("/admin/urunler")->with("toast_warning","Lütfen Bir Arama Yapınız");

        }

    }
}
