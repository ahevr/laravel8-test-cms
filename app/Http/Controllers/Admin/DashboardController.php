<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AyalarModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $ayar = AyalarModel::all()->first();

        return view("tema.admin.page.dashboard.index", compact("ayar"));

    }


}
