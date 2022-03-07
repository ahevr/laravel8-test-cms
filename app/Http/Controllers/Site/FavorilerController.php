<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\Admin\FavorilerModel;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\OrderDetail;
use App\Models\Admin\UrunlerModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavorilerController extends Controller
{
    public function index(){

        $categories       = KategorilerModel::where('parent_id', '=', 0)->get();

        return view("tema.site.page.homepage.favoriler",compact("categories"));

    }

    public function add(){

        $urun = UrunlerModel::find(\request("id"));

        Cart::instance("wishlist")->add($urun->id, $urun->title, 1, $urun->toplam_fyt, 0,
            [
                "image"    => $urun->image,
                "stok"     => $urun->stok_kodu,
                "renkler"  => $urun->renkler->renk_adi,
                "kategori" => $urun->kategoriler->name,
                "url"      => $urun->url
            ]
        );

        foreach (Cart::instance("wishlist")->content() as $favoriItem){

            $x = array(
                "urunler_id"    => $favoriItem->id,
                "adet"          => $favoriItem->qty,
                "fiyat"         => $favoriItem->total,
                "image"         => $favoriItem->options->image,
                "stok_kodu"     => $favoriItem->options->stok,
                "kullanici_id"  => Auth::guard("uye")->id(),
            );

            FavorilerModel::create($x);

        }

        Cart::instance("wishlist")->destroy();


        return redirect()->route("site.index")->with("toast_success","Ürün Favorilere Eklendi");

    }


    public function favorilerimDashboard($id){

        $fav = FavorilerModel::where("kullanici_id",$id)->get();



        $ayar = AyalarModel::all()->first();

        $data = FavorilerModel::where("kullanici_id",$id)->first();

        $categories  = KategorilerModel::where('parent_id', '=', 0)->get();

        return view("tema.site.page.homepage.favoriler",compact("ayar","fav","data","categories"));

    }



}
