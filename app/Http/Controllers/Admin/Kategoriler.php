<?php

namespace App\Http\Controllers\Admin;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\Admin\KategorilerModel;
use Illuminate\Http\Request;

class Kategoriler extends Controller
{
    public function index(){

        $ayar     = AyalarModel::all()->first();

        $data = KategorilerModel::paginate(10);

        return view("tema.admin.page.kategoriler.index",compact("data","ayar"));

    }

    public function create(){

        $ayar     = AyalarModel::all()->first();

        return view("tema.admin.page.kategoriler.create",compact("ayar"));

    }

    public function store(Request $request){

        $request->validate([

            "name" => "required|min:2|max:100",
        ]);

        $ekle = KategorilerModel::create([

            "name" => $request->name,
            "url"  => mHelper::permalink($request->name),
        ]);

        if ($ekle){

            return redirect("admin/kategoriler")->with("toast_success","Kategori Başarılı Bir Şekilde Eklendi");

        } else {

            return redirect("admin/kategoriler")->with("toast_error","Hata Var");
        }

    }

    public function delete($id){


        $sil = KategorilerModel::where("id",$id)->delete();

        if ($sil){

            return redirect("admin/kategoriler")->with("toast_warning","Kategori Başarılı Bir Şekilde Silindi");

        } else {

            return redirect("admin/kategoriler")->with("toast_success","Hata Var");

        }

    }
}
