<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CikisController extends Controller
{
    public function index(){

        auth()->logout();

        return redirect("login")->with("toast_success","Çıkış Başarılı");


    }
}
