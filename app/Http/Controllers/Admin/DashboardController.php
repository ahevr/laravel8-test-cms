<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    public function login(){

        return view("auth.login");

    }
    protected function register(){

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
