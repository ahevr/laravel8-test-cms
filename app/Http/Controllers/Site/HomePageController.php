<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\UrunlerModel;
use App\Models\Uye;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class HomePageController extends Controller{

    public function check(Request $request){

        $request->validate(["email"=>"required|email|exists:uyes,email"]);

        $creds = $request->only("email","password");

        if (Auth::guard("uye")->attempt($creds)){

            return redirect()->route("site.index");

        }else{

            return redirect()->route("site.uye-login");
        }

    }


    public function login(){

        return view("auth.login-user");

    }
    protected function register(){

        return view("auth.register-user");

    }

    public function logout(){

        Auth::guard("uye")->logout();

        return redirect("/")->with("toast_success","Çıkış Başarılı");
    }

    public function create(Request $request){

        $request->validate([
            "name" => "required|min:2|max:255",
            "email" => "required",
            'password' => [
                'required',
                'string',
                Password::min(6)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                'confirmed'
            ],
        ]);
        $adminRegister = new Uye();

        $adminRegister->name = $request->name;
        $adminRegister->email = $request->email;
        $adminRegister->password =  Hash::make($request->password);

        $save = $adminRegister->save();

        if ($save){
            return redirect("admin/login");
        } else {
            return redirect("admin/login");
        }

    }


    public function index(){

        $categories       = KategorilerModel::where('parent_id', '=', 0)->get();

        $urunleriGetir    = UrunlerModel::where("isActive",1);

        $toplamUrunSayisi = UrunlerModel::count();

        if  (strip_tags(trim(request()->has('sort') && !empty(request()->get("sort"))))) {

            if (request()->get("sort")=="product_name_a_z"){
                $urunleriGetir->orderBy("id","Desc");

            } elseif (request()->get("sort")=="price_lowest"){
                $urunleriGetir->orderBy("toplam_fyt","Asc");

            }elseif (request()->get("sort")=="price_highest"){
                $urunleriGetir->orderBy("toplam_fyt","Desc");
            }
            else{
                $urunleriGetir->ordeyBy("id","Desc");
            }
        }

        $urunleriGetir = $urunleriGetir->paginate(9);


        return view("tema.site.page.homepage.index",compact("urunleriGetir","categories","toplamUrunSayisi"));

    }


}
