<?php

namespace App\Http\Controllers\Admin;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\UrunlerImageModel;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;

class Urunler extends Controller
{

    public function index(){

        $data = UrunlerModel::paginate(10);

        return view("tema.admin.page.urunler.index",compact("data"));

    }

    public function create(){

        return view("tema.admin.page.urunler.create");

    }

    public function store(Request $urunler){

        $urunler->validate([
            "title" => "required|min:2|max:100",
        ]);

        $ekle = UrunlerModel::create([

            "url"      => mHelper::permalink($urunler->title),
            "title"    => $urunler->title,
            "desc"     => $urunler->desc,
            "fyt"      => $urunler->fyt,
            "isActive" => 1,
            "image"    => imageUpload::singleUpload(strtolower(($urunler->title)),"urunler",$urunler->file("image")),
        ]);

        if ($ekle){

            return redirect("admin/urunler")->with("toast_success","Yazarlar Başarılı Bir Şekilde Eklendi");

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

            return redirect("admin/urunler")->with("toast_warning","Yayinevi Başarılı Bir Şekilde Silindi");

        } else {

            return redirect("admin/urunler")->with("toast_success","Hata Var");

        }



    }

    public function edit($id){

        $data = UrunlerModel::where("id",$id)->first();

        if ($data){

            return view("tema.admin.page.urunler.update",compact("data"));

        } else {

            return redirect()->route("tema.admin.page.urunler");

        }

    }

    public function update(Request $urunler,$id){

        $urunler->validate([
            "title" => "required|min:2|max:100",
            "desc"  => "required|min:5|max:50"
        ]);
        $data = UrunlerModel::where("id","=",$id)->get();

        $update = UrunlerModel::where("id",$id)->update([

            "url"      => mHelper::permalink($urunler->title),
            "title"    => $urunler->title,
            "desc"     => $urunler->desc,
            "fyt"      => $urunler->fyt,
            "isActive" => 1,
            "image"    => imageUpload::singleUploadUpdate(strtolower(($urunler->name)),"yazarlar",$urunler->file("image"),$data,"image"),
        ]);

        if ($update){

            return redirect("admin/urunler")->with("toast_success","Yazarlar Başarılı Bir Şekilde Güncellendi");

        } else {

            return redirect("admin/urunler")->with("toast_error","Hata Var");
        }

    }

    public function galeri($id){

        $galeri = UrunlerModel::where("id",$id)->first();

        $data  = UrunlerImageModel::where('urunler_id', $id)->get();

        return view("tema.admin.page.urunler.galeri",["data"=>$data,"galeri"=>$galeri]);



    }

    public function galeriSet(Request $urunler,$id){


        $ekle = UrunlerImageModel::create([
            "urunler_id"  => $urunler->id,
            "image" => imageUpload::singleUpload(strtolower(($urunler->id)),"urunler",$urunler->file("image")),

        ]);

        if ($ekle){

            return redirect("admin/urunler")->with("toast_success","Yazarlar Başarılı Bir Şekilde Eklendi");

        } else {

            return redirect("admin/urunler")->with("toast_error","Hata Var");
        }



    }





}