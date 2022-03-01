<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\Admin\OrderDetail;
use App\Models\Admin\SiparislerModel;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;

class Siparisler extends Controller
{
    public function index(){

        $data = OrderDetail::paginate(10);

        $ayar = AyalarModel::all()->first();

        return view("tema.admin.page.siparisler.index",compact("data","ayar"));

    }

    public function sipDetay($id){

          $data = OrderDetail::where("id",$id)->first();

          $ayar = AyalarModel::all()->first();

          $sip  = SiparislerModel::where("siparisid",$id)->get();

          return view("tema.admin.page.siparisler.detay",compact("data","ayar","sip"));

    }



}
