<?php

namespace App\Http\Controllers\Admin;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\RenklerModel;
use App\Models\Admin\UrunlerImageModel;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Urunler extends Controller{

    public function index(){

        $data = UrunlerModel::paginate(5);

        $ayar = AyalarModel::all()->first();

        return view("tema.admin.page.urunler.index",compact("data","ayar"));

    }

    public function create(){

        $ayar     = AyalarModel::all()->first();
        $renk     = RenklerModel::all();
        $kategori = KategorilerModel::all();

        return view("tema.admin.page.urunler.create",["renk"=>$renk,"kategori"=>$kategori,"ayar"=>$ayar]);

    }

    public function store(Request $urunler){

        $urunler->validate([
            "title" => "required|min:2|max:255",
        ]);


        $kategoriName = KategorilerModel::where("id",$urunler->input("kategori_id"))->value("name");
        $renkName     = RenklerModel::    where("id",$urunler->input("renkid"))->value("renk_adi");

        $ekle = UrunlerModel::create([

            "url"           => mHelper::permalink($urunler->title),
            "title"         => $urunler->title ,
            "desc"          => $urunler->desc,
            "fyt"           => $urunler->fyt,
            "indirim_orani" => $urunler->indirim_orani,
            "toplam_fyt"    => $urunler->toplam_fyt,
            "renkid"        => $urunler->renkid,
            "kategori_id"   => $urunler->kategori_id,
            "kategori_name" => $kategoriName,
            "renk_adi"      => $renkName,
            "stok_kodu"     => $urunler->stok_kodu,
            "barkod"        => rand(1000000000000,9999999999999),
            "isActive"      => 1,
            "image"         => imageUpload::singleUpload(strtolower(substr(mHelper::permalink($urunler->title),0,15)),"urunler",$urunler->file("image")),

        ]);

        if ($ekle){

            return redirect("admin/urunler")->with("toast_success","Ürünler Başarılı Bir Şekilde Eklendi");

        } else {

            return redirect("admin/urunler")->with("toast_error","Hata Var");
        }



    }

    public function status(Request $urunler,$id){

        $status = UrunlerModel::select("isActive")->where("id",$id)->first();

        if ($status->isActive == "1") {

            $isActive = "0";

        } else {

            $isActive = "1";

        }


        $durum = array("isActive"=>$isActive);


        UrunlerModel::where("id",$id)->update($durum);

        if ($durum){

            return redirect("admin/urunler")->with("toast_success","Durum Değiştirme Başarılı");

        } else {

            return redirect("admin/urunler")->with("toast_error","Hata Var");
        }

    }

    public function delete($id){


        $sil = UrunlerModel::where("id",$id)->delete();

        if ($sil){

            return redirect("admin/urunler")->with("toast_warning","Ürünler Başarılı Bir Şekilde Silindi");

        } else {

            return redirect("admin/urunler")->with("toast_success","Hata Var");

        }



    }

    public function edit($id){

        $renk = RenklerModel::all();

        $kategori = KategorilerModel::all();

        $data = UrunlerModel::where("id",$id)->first();

        $ayar     = AyalarModel::all()->first();

        if ($data){

            return view("tema.admin.page.urunler.update",compact("data","renk","kategori","ayar"));

        } else {

            return redirect()->route("tema.admin.page.urunler");

        }

    }

    public function update(Request $urunler,$id){

        $urunler->validate([
            "title" => "required|min:2|max:255",
        ]);
        $data = UrunlerModel::where("id","=",$id)->get();

        $update = UrunlerModel::where("id",$id)->update([

            "url"      => mHelper::permalink($urunler->title),
            "title"    => $urunler->title,
            "desc"     => $urunler->desc,
            "fyt"      => $urunler->fyt,
            "indirim_orani" => $urunler->indirim_orani,
            "toplam_fyt"    => $urunler->toplam_fyt,
            "isActive" => 1,
            "renkid"   => $urunler->renkid,
            "kategori_id"   => $urunler->kategori_id,
            "stok_kodu"     => $urunler->stok_kodu,
            "image"    => imageUpload::singleUploadUpdate(strtolower(substr($urunler->name,0,15)),"yazarlar",$urunler->file("image"),$data,"image"),
        ]);

        if ($update){

            return redirect("admin/urunler")->with("toast_success","Ürünler Başarılı Bir Şekilde Güncellendi");

        } else {

            return redirect("admin/urunler")->with("toast_error","Hata Var");
        }

    }

    public function fotoStatus(Request $urunler,$id){

        $status = UrunlerImageModel::select("isActive")->where("id",$id)->first();


        if ($status->isActive == "1") {

            $isActive = "0";

        } else {

            $isActive = "1";

        }

        $durum = array("isActive"=>$isActive);


        UrunlerImageModel::where("id",$id)->update($durum);

        if ($durum){

            return redirect("admin/urunler")->with("toast_success","Durum Değiştirme Başarılı");

        } else {

            return redirect("admin/urunler")->with("toast_error","Hata Var");
        }

    }

    public function galeri($id){

        $galeri = UrunlerModel::where("id",$id)->first();

        $data  = UrunlerImageModel::where('urunler_id', $id)->get();

        $ayar     = AyalarModel::all()->first();

        return view("tema.admin.page.urunler.galeri",["data"=>$data,"galeri"=>$galeri,"ayar"=>$ayar]);



    }

    public function galeriSet(Request $urunler,$id){


        $ekle = UrunlerImageModel::create([
            "urunler_id"  => $urunler->id,
            "isActive"    => 1,
            "image" => imageUpload::singleUpload(strtolower(($urunler->id)),"urunler",$urunler->file("image")),

        ]);

        if ($ekle){

            return redirect("admin/urunler/galeriForm/$id")->with("toast_success","Ürünler'ın Fotoğrafı Başarılı Bir Şekilde Eklendi");

        } else {

            return redirect("admin/urunler")->with("toast_error","Hata Var");
        }

    }

    public function fotoDelete($id){


        $sil = UrunlerImageModel::where("id",$id)->delete();

        if ($sil){

            return redirect("admin/urunler")->with("toast_warning","Ürün Fotoğrafı Başarılı Bir Şekilde Silindi");

        } else {

            return redirect("admin/urunler")->with("toast_success","Hata Var");

        }

    }

    public function review($id){

        $renk = RenklerModel::all();

        $kategori = KategorilerModel::all();

        $data = UrunlerModel::where("id",$id)->first();

        $ayar     = AyalarModel::all()->first();

        if ($data){

            return view("tema.admin.page.urunler.review",compact("data","renk","kategori","ayar"));

        } else {

            return redirect()->route("tema.admin.page.urunler");

        }
    }

}
