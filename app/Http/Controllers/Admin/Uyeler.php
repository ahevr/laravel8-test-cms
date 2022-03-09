<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\Admin\UrunlerModel;
use App\Models\Admin\UyelerModel;
use App\Models\Uye;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Uyeler extends Controller
{
   public function index(){

       $data  = Uye::paginate(5);

       $ayar  = AyalarModel::all()->first();

       return view("tema.admin.page.uyeler.index",compact("data","ayar"));
   }


   public function edit($id){

       $data = Uye::where("id",$id)->first();

       $ayar = AyalarModel::all()->first();

       if ($data){

           return view("tema.admin.page.uyeler.update",compact("data","ayar"));

       } else {

           return redirect()->route("tema.admin.page.update");

       }

   }

   public function update(Request $request,$id){

       $x = Uye::find($id);

       $x->name     = $request->name;
       $x->surname  = $request->surname;
       $x->phone    = $request->phone;
       $x->email    = $request->email;
       $x->il       = $request->il;
       $x->ilce     = $request->ilce;
       $x->adres    = $request->adres;
       $x->password = Hash::make($request->password);

       $x->update();

       return back()->with("toast_success","Üye Profilini Güncellendi");

   }

}
