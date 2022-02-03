<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

//Auth::routes();



// SİTE Route** //
Route::group(["namespace"=>"site","as" => "site."],function (){

    Route::get ("/"                ,"HomePageController@index"      )->name("index");
    Route::get ("/urun-detay/{url}","UrunlerPageController@index"   )->name("urun-detay");
    Route::get ("/search"          ,"search@index"                  )->name("search");
    Route::get ("/kategori/{url}"  ,"KategoriController@index"      )->name("kategori");
});




// ADMİN Route** //
Route::group(["namespace"=>"admin","prefix"=>"admin","as" => "admin.","middleware"=>["auth"]],function (){

    Route::get("/","dashboardcontroller@index")->name("index");
    Route::post('/cikis', 'cikiscontroller@index')->name('cikis');

    // Ürünler Route** //

    Route::group(["prefix"=>"urunler","as"=>"urunler."],function() {
        Route::get ( "/"                , "urunler@index"     )->name("index");
        Route::get ( "/ekleForm"        , "urunler@create"    )->name("ekleForm");
        Route::post( "/ekle"            , "urunler@store"     )->name("ekle.post");
        Route::get ( "/duzenleForm/{id}", "urunler@edit"      )->name("duzenleForm");
        Route::get ( "/inceleForm/{id}" , "urunler@review"    )->name("inceleForm");
        Route::post( "/duzenle/{id}"    , "urunler@update"    )->name("duzenle.post");
        Route::get ( "/galeriForm/{id}" , "urunler@galeri"    )->name("galeriForm");
        Route::post( "/galeri/{id}"     , "urunler@galeriSet" )->name("galeri.post");
        Route::get ( "/sil/{id}"        , "urunler@delete"    )->name("sil");
        Route::get ( "/status/{id}"     , "urunler@status"    )->name("status");
        Route::get ( "/fotoStatus/{id}" , "urunler@fotoStatus")->name("fotoStatus");
        Route::get ( "/fotoSil/{id}"    , "urunler@fotoDelete")->name("fotoSil");
        Route::get ( "/search"          , "search@index"      )->name("search");
    });

    // Renkler Route** //

    Route::group(["prefix"=>"renkler","as"=>"renkler."],function() {
        Route::get ( "/"        , "renkler@index" )->name("index");
        Route::get ( "/ekleForm", "renkler@create")->name("ekleForm");
        Route::post( "/ekle"    , "renkler@store" )->name("ekle.post");
        Route::get ( "/sil/{id}", "renkler@delete")->name("sil");
    });

    // Kategoriler Route** //

    Route::group(["prefix"=>"kategoriler","as"=>"kategoriler."],function() {
        Route::get( "/" ,"kategoriler@index")->name("index");
        Route::post("/add-category"       ,"kategoriler@store")->name("add.category");
    });


    // Ayarlar Route** //

    Route::group(["prefix"=>"ayarlar","as"=>"ayarlar."],function() {
        Route::get ( "/"                , "ayarlar@index" )->name("index");
        Route::get ( "/ekleForm"        , "ayarlar@create")->name("ekleForm");
        Route::post( "/ekle"            , "ayarlar@store" )->name("ekle.post");
        Route::get ( "/sil/{id}"        , "ayarlar@delete")->name("sil");
        Route::get ( "/duzenleForm/{id}", "ayarlar@edit"  )->name("duzenleForm");
        Route::post( "/duzenle/{id}"    , "ayarlar@update")->name("duzenle.post");
    });


    // Slider Route** //

    Route::group(["prefix"=>"slider","as"=>"slider."],function() {
        Route::get ( "/"                , "slider@index" )->name("index");
        Route::get ( "/ekleForm"        , "slider@create")->name("ekleForm");
        Route::post( "/ekle"            , "slider@store" )->name("ekle.post");
        Route::get ( "/sil/{id}"        , "slider@delete")->name("sil");
        Route::get ( "/duzenleForm/{id}", "slider@edit"  )->name("duzenleForm");
        Route::post( "/duzenle/{id}"    , "slider@update")->name("duzenle.post");
        Route::get ( "/status/{id}"     , "slider@status")->name("status");
    });



});

