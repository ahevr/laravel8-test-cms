<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\Admin\UyelerModel;
use Illuminate\Http\Request;

class Uyeler extends Controller
{
   public function index(){

       $data = UyelerModel::paginate(5);

       $ayar     = AyalarModel::all()->first();

       return view("tema.admin.page.uyeler.index",compact("data","ayar"));
   }
}
