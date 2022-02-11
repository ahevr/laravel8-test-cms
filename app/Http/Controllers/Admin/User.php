<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use App\Models\Admin\UserModel;
use App\Models\Admin\UyelerModel;
use Illuminate\Http\Request;

class User extends Controller
{
    public function index(){

        $data = UserModel::paginate(5);

        $ayar     = AyalarModel::all()->first();

        return view("tema.admin.page.user.index",compact("data","ayar"));
    }

    public function create(){
        $ayar     = AyalarModel::all()->first();

        return view("tema.admin.page.user.create",compact("ayar"));

    }
}
