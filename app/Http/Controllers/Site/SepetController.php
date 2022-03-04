<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\SepetUrunModel;
use App\Models\Admin\SiparislerModel;
use App\Models\Admin\UrunlerModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SepetController extends Controller
{

    public function index(){

        $categories       = KategorilerModel::where('parent_id', '=', 0)->get();

        return view("tema.site.page.homepage.sepet",compact("categories"));

    }

    public function add(){

        $urun = UrunlerModel::find(\request("id"));

        Cart::add($urun->id, $urun->title, 1, $urun->toplam_fyt, 0,
            [
                "image"    => $urun->image,
                "stok"     => $urun->stok_kodu,
                "renkler"  => $urun->renkler->renk_adi,
                "kategori" => $urun->kategoriler->name,
                "url"      => $urun->url
            ]
        );

        return redirect()->route("site.index")->with("toast_success","Ürün Sepete Eklendi");

    }

    public function update($rowid){

        Cart::update($rowid,\request("qty"));

        return response()->json(["success"=>true]);

    }

    public function delete($rowid){

        Cart::remove($rowid);

        return  redirect()->route("site.sepet")->with("toast_success","Sepet Güncellendi");

    }

    public function destroy(){

        Cart::destroy();

        return  redirect()->route("site.index")->with("toast_success","Sepet Temizlendi");
    }

}
