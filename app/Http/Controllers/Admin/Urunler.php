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
//use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function store(Request $request){

        $request->validate([
            "title" => "required|min:2|max:255",
            "image" => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $urunler = new UrunlerModel();
        $urunler->url            =  mHelper::permalink($request->title);
        $urunler->title          = $request->title;
        $urunler->desc           = $request->desc;
        $urunler->fyt            = $request->fyt;
        $urunler->indirim_orani  = $request->indirim_orani;
        $urunler->toplam_fyt     = $request->toplam_fyt;
        $urunler->isActive       = 1;
        $urunler->renkler_id     = $request->renkler_id;
        $urunler->kategoriler_id = $request->kategoriler_id;
        $urunler->stok_kodu      = $request->stok_kodu;
        $urunler->image = $request->file('image');

        $urunler->save();

        if ($urunler){

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


        $urunler = UrunlerModel::find($id);

        $destination = "tema/admin/uploads/urunler/".$urunler->image;

        if (File::exists($destination)){

            File::delete($destination);

        }

        $urunler->delete();

        if ($urunler){

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

    public function update(Request $request ,$id){

        $urunler = UrunlerModel::find($id);
        $urunler->url            =  mHelper::permalink($request->title);
        $urunler->title          = $request->title;
        $urunler->desc           = $request->desc;
        $urunler->fyt            = $request->fyt;
        $urunler->indirim_orani  = $request->indirim_orani;
        $urunler->toplam_fyt     = $request->toplam_fyt;
        $urunler->renkler_id     = $request->renkler_id;
        $urunler->kategoriler_id = $request->kategoriler_id;
        $urunler->stok_kodu      = $request->stok_kodu;
        $urunler->image = $request->file('image');

        $urunler->update();


        if ($urunler){

            return redirect("admin/urunler")->with("toast_success","Ürünler Başarılı Bir Şekilde Eklendi");

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

    public function galeriSet(Request $request,$id){

        $urunler = new UrunlerImageModel();

        $urunler->urunler_id  = $request->id;
        $urunler->isActive    = 1;

        $urunler->image = $request->file('image');

//        if ($request->hasFile("image")){
//            $file = $request->file("image");
//            $extention = $file->getClientOriginalExtension();
//            $filename = time(). "." .$extention;
//            $file->move("tema/admin/uploads/urunler/",$filename);
//            $urunler->image = $filename;
//        }

        $urunler->save();


        if ($urunler){

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
