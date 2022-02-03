<?php

namespace App\Http\Controllers\Admin;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\Admin\RenklerModel;
use App\Models\Admin\SliderModel;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;

class Slider extends Controller
{
    public function index(){

        $data     = SliderModel::paginate(5);

        $ayar     = AyalarModel::all()->first();

        return view("tema.admin.page.slider.index",compact("data","ayar"));

    }

    public function create(){

        $ayar = AyalarModel::all()->first();

        return view("tema.admin.page.slider.create",compact("ayar"));

    }

    public function store(Request $request){

        $request->validate([

            "baslik" => "required|min:2|max:100",

        ]);

        $slider = new SliderModel();
        $slider->url   =  mHelper::permalink($request->baslik);
        $slider->baslik = $request->baslik;
        $slider->desc = $request->desc;
        $slider->buton = $request->buton == "on" ? 1 : 0;
        $slider->buton_url = $request->buton_url;
        $slider->buton_adi = $request->buton_adi;
        $slider->isActive       = 1;

        if ($request->hasFile("image")){
            $file = $request->file("image");
            $extention = $file->getClientOriginalExtension();
            $filename = time(). "." .$extention;
            $file->move("tema/admin/uploads/slider/",$filename);
            $slider->image = $filename;
        }

        $slider->save();

        if ($slider){

            return redirect("admin/slider")->with("toast_success","Slider Başarılı Bir Şekilde Eklendi");

        } else {

            return redirect("admin/slider")->with("toast_error","Hata Var");
        }

    }

    public function status(Request $request,$id){

        $status = SliderModel::select("isActive")->where("id",$id)->first();

        if ($status->isActive == "1") {

            $isActive = "0";

        } else {

            $isActive = "1";

        }

        $durum = array("isActive"=>$isActive);

        SliderModel::where("id",$id)->update($durum);

        if ($durum){

            return redirect("admin/slider")->with("toast_success","Durum Değiştirme Başarılı");

        } else {

            return redirect("admin/slider")->with("toast_error","Hata Var");

        }

    }

}
