<?php

namespace App\Http\Controllers\Admin;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\Admin\RenklerModel;
use Illuminate\Http\Request;

class Renkler extends Controller{


    public function index(){

        $data = RenklerModel::paginate(5);

        $ayar     = AyalarModel::all()->first();

        return view("tema.admin.page.renkler.index",compact("data","ayar"));

    }

    public function create(){

        $ayar     = AyalarModel::all()->first();
        return view("tema.admin.page.renkler.create",compact("ayar"));

    }

    public function store(Request $request){

        $request->validate([
            "renk_adi" => "required|min:2|max:100",
        ]);

        $ekle = RenklerModel::create([

            "renk_adi"    => $request->renk_adi,
        ]);

        if ($ekle){

            return redirect("admin/renkler")->with("toast_success","Renkler Başarılı Bir Şekilde Eklendi");

        } else {

            return redirect("admin/renkler")->with("toast_error","Hata Var");
        }

    }

    public function delete($id){


        $sil = RenklerModel::where("id",$id)->delete();

        if ($sil){

            return redirect("admin/renkler/")->with("toast_warning","Yayinevi Başarılı Bir Şekilde Silindi");

        } else {

            return redirect("admin/renkler")->with("toast_success","Hata Var");

        }

    }
}
