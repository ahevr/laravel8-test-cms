<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\OrderDetail;
use App\Models\Uye;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class KullaniciController extends Controller
{
    public function index(){

        $categories       = KategorilerModel::where('parent_id', '=', 0)->get();

        return view("tema.site.page.homepage.kullanici",compact("categories"));

    }

    public function info($id){

        $categories = KategorilerModel::where('parent_id', '=', 0)->get();

        $ayar = AyalarModel::all()->first();

        $data = OrderDetail::where("kullanici_id",$id)->first();

        $pw   = Uye::where("id",$id)->first();

        return view("tema.site.page.homepage.kullanici",compact("data","categories","ayar","pw"));


    }


    public function update(Request $request,$id){

        $uye = Uye::find($id);

        $uye->name     = $request->name;
        $uye->surname  = $request->surname;
        $uye->phone    = $request->phone;
        $uye->email    = $request->email;
        $uye->il       = $request->il;
        $uye->ilce     = $request->ilce;
        $uye->adres    = $request->adres;
        $uye->password = Hash::make($request->password);

        $uye->update();


        if ($uye){
            Auth::guard("uye")->logout();

            return redirect("/uye/login")->with("toast_success","Profil Bilgileriniz Güncellendi Lütfen Giriş Yapın");
        } else {

            return back()->with("toast_error","Hata Oluştu");
        }


    }


}
