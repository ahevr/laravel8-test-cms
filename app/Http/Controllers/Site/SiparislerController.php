<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\SiparislerModel;
use App\Models\Admin\UrunlerModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiparislerController extends Controller
{

    public function index(){

        $categories       = KategorilerModel::where('parent_id', '=', 0)->get();

        return view("tema.site.page.homepage.siparisler",compact("categories"));

    }

    public function add(){

            foreach(Cart::content() as $productCartItem) {

                $x = array(
                    "urun_id"      =>$productCartItem->id,
                    "adet"         =>$productCartItem->qty,
                    "fiyat"        =>$productCartItem->total,
                    'image'        => $productCartItem->options->image,
                    "stok_kodu"    => $productCartItem->options->stok,
                    "kullanici_id" => Auth::guard("uye")->id(),
                );

                SiparislerModel::create($x);
            }

            Cart::destroy();

            return  redirect()->route("site.index")->with("toast_success","Sipariş Başarılı Bir Şekilde Tamamlandı");



    }
}
