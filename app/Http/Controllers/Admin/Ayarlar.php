<?php

namespace App\Http\Controllers\Admin;

use App\Helper\imageUpload;
use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use Illuminate\Http\Request;

class Ayarlar extends Controller{

    public function index(){

        $data = AyalarModel::paginate(5);

        $ayar = AyalarModel::all()->first();

        return view("tema.admin.page.ayarlar.index",compact("data","ayar"));

    }

    public function create(){

        $ayar = AyalarModel::all()->first();

        return view("tema.admin.page.ayarlar.create",compact("ayar"));

    }

    public function store(Request $request){

        $request->validate([

            "site_adi" => "required|min:2|max:100",

        ]);

        $ekle = AyalarModel::create([

            "site_adi"   => $request->site_adi,
            "site_desc"  => $request->site_desc,
            "site_mail"  => $request->site_mail,
            "telefon"    => $request->telefon,
            "adres"      => $request->adres,
            "facebook"   => $request->facebook,
            "youtube"    => $request->youtube,
            "twitter"    => $request->twitter,
            "linkedin"   => $request->linkedin,
            "instagram"  => $request->instagram,
            "site_logo"  => imageUpload::singleUpload(strtolower(substr($request->site_adi,0,15)),"ayarlar",$request->file("site_logo")),
        ]);

        if ($ekle){

            return redirect("admin/ayarlar")->with("toast_success","Site Ayarları Başarılı Bir Şekilde Eklendi");

        } else {

            return redirect("admin/ayarlar")->with("toast_error","Hata Var");
        }

    }

    public function edit($id){

        $data = AyalarModel::where("id",$id)->first();

        $ayar = AyalarModel::all()->first();

        return view("tema.admin.page.ayarlar.update",compact("data","ayar"));

    }

    public function update(Request $request,$id){

        $request->validate([
            "site_adi" => "required|min:2|max:255",
        ]);

        $data = AyalarModel::where("id","=",$id)->get();

        $update = AyalarModel::where("id",$id)->update([

            "site_adi"   => $request->site_adi,
            "site_desc"  => $request->site_desc,
            "site_mail"  => $request->site_mail,
            "telefon"    => $request->telefon,
            "adres"      => $request->adres,
            "facebook"   => $request->facebook,
            "youtube"    => $request->youtube,
            "twitter"    => $request->twitter,
            "linkedin"   => $request->linkedin,
            "instagram"  => $request->instagram,
            "site_logo"  => imageUpload::singleUploadUpdate(strtolower(substr($request->site_adi,0,15)),"ayarlar",$request->file("site_logo"),$data,"site_logo"),
        ]);

        if ($update){

            return redirect("admin/ayarlar")->with("toast_success","Ayarlar Başarılı Bir Şekilde Güncellendi");

        } else {

            return redirect("admin/ayarlar")->with("toast_error","Hata Var");
        }

    }

}
