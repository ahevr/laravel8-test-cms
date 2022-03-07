<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\OrderDetail;
use App\Models\Admin\SiparislerModel;
use App\Models\Admin\UrunlerModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function Symfony\Component\String\s;

class SiparislerController extends Controller
{

    public function index(){

        $categories       = KategorilerModel::where('parent_id', '=', 0)->get();

        return view("tema.site.page.homepage.siparisler",compact("categories"));

    }

    public function add(Request $request){

        $request->validate([

            'adi' => 'required',
            'soyadi' => 'required',
            'email' => 'required',
            'il' => 'required',
            'ilce' => 'required',
            'adres' => 'required',
            'telefon' => 'required|digits:11|numeric',

        ]);



        $input = $request->all();
        $input["orderNo"] = rand(100000000,999999999);
        $input["kullanici_id"] = Auth::guard("uye")->id();
        $input["toplamfiyat"]  = Cart::instance('shopping')->total();
        OrderDetail::create($input);

        if ($input){

            $sonid = OrderDetail::all()->last()->id;

                foreach(Cart::instance('shopping')->content() as $productCartItem) {

                    $x = array(
                        "urunler_id"    => $productCartItem->id,
                        "adet"          => $productCartItem->qty,
                        "fiyat"         => $productCartItem->total,
                        "image"         => $productCartItem->options->image,
                        "stok_kodu"     => $productCartItem->options->stok,
                        "kullanici_id"  => Auth::guard("uye")->id(),
                        "siparisid"     => $sonid,
                        "kategori"      => $productCartItem->options->kategori,
                    );

                    SiparislerModel::create($x);
                }


//                $email = $request->email;
//                $array = [
//                    "adi"           => $request->adi,
//                    "urunler_id"    => $productCartItem->id,
//                    "adet"          => $productCartItem->qty,
//                    "fiyat"         => $productCartItem->total,
//                    'image'         => $productCartItem->options->image,
//                    "stok_kodu"     => $productCartItem->options->stok,
//                ];
//                Mail::send("tema.contactMail",$array,function ($message) use ($email){
//                    $message->from('destek@egesedefavize.com');
//                    $message->to($email);
//
//                });

            Cart::destroy();

            return  redirect()->route("site.index")->with("toast_success","Sipariş Başarılı Bir Şekilde Tamamlandı");


        } else {

            return view("errors.404");

        }

    }


    public function siparisDashboard($id){

        $sip  = OrderDetail::where("kullanici_id",$id)->get();

        $ayar = AyalarModel::all()->first();

        $data = OrderDetail::where("kullanici_id",$id)->first();

        $categories       = KategorilerModel::where('parent_id', '=', 0)->get();

        return view("tema.site.page.homepage.siparislerim",compact("ayar","sip","data","categories"));


    }

    public function siparisDetayDashboard($id){

        $data = OrderDetail::where("id",$id)->get();

        $sip  = SiparislerModel::where("siparisid",$id)->get();

        $categories  = KategorilerModel::where('parent_id', '=', 0)->get();

        $ayar = AyalarModel::all()->first();

        return view("tema.site.page.homepage.siparislerimDetay",compact("ayar","data","categories","sip"));
    }





}
