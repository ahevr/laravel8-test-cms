<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\KategorilerModel;
use App\Models\Admin\UrunlerModel;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){

        $katGetir = KategorilerModel::all();

        $urunleriGetir = UrunlerModel::where("isActive",1)->paginate(10);

        return view("tema.site.page.homepage.index",compact("urunleriGetir","katGetir"));

    }

}
