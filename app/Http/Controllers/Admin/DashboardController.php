<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\User;
use App\Models\Uye;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{


    public function check(Request $request){

       $request->validate(["email"=>"required|email|exists:users,email"]);

       $creds = $request->only("email","password");

       if (Auth::guard("web")->attempt($creds)){

           return redirect()->route("admin.index");

       }else{

           return redirect()->route("admin.login");
       }

    }

    public function create(Request $request){

        $request->validate([
            "name" => "required|min:2|max:255",
            "email" => "required",
        ]);
        $adminRegister = new User();

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




    public function login(){

        return view("auth.login");

    }
    public function register(){

        return view("auth.register");

    }


    public function logout(){

        Auth::guard("web")->logout();

        return redirect("admin/login")->with("toast_success","Çıkış Başarılı");
    }


    public function index(){

        $ayar = AyalarModel::all()->first();

        return view("tema.admin.page.dashboard.index", compact("ayar"));

    }


}
