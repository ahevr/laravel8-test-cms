<?php

namespace App\Http\Controllers\Admin;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\Admin\KategorilerModel;
use App\Models\Category;
use Illuminate\Http\Request;

class Kategoriler extends Controller
{
    public function index(){

        $ayar           = AyalarModel::all()->first();

        $categories     = KategorilerModel::where('parent_id', '=', 0)->get();

        $allCategories  = KategorilerModel::all();

        return view("tema.admin.page.kategoriler.create",["categories"=>$categories,"ayar"=>$ayar,"allCategories"=>$allCategories]);

    }


    public function store(Request $request){

        $request->validate([

            "name" => "required|min:2|max:100",
        ]);

        $input = $request->all();

        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        $input["url"] = mHelper::permalink($request->name);

        KategorilerModel::create($input);

        if ($input){

            return redirect("admin/kategoriler")->with("toast_success","Kategori Başarılı Bir Şekilde Eklendi");

        } else {

            return redirect("admin/kategoriler")->with("toast_error","Hata Var");
        }


    }
}
