<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;




Route::group(["namespace"=>"admin","prefix"=>"admin","as" => "admin.","middleware"=>["auth"]],function (){

    Route::get("/","dashboardcontroller@index")->name("index");

    Route::post('/cikis', 'cikiscontroller@index')->name('cikis');

    // Ürünler Route** //

    Route::group(["prefix"=>"urunler","as"=>"urunler."],function() {

        Route::get  ( "/"                 , "urunler@index"     )   ->name("index");
        Route::get  ( "/ekleForm"         , "urunler@create"    )   ->name("ekleForm");
        Route::post ( "/ekle"             , "urunler@store"     )   ->name("ekle.post");
        Route::get  ( "/duzenleForm/{id}" , "urunler@edit"      )   ->name("duzenleForm");
        Route::post ( "/duzenle/{id}"     , "urunler@update"    )   ->name("duzenle.post");
        Route::get  ( "/galeriForm/{id}"  , "urunler@galeri"    )   ->name("galeriForm");
        Route::post ( "/galeri/{id}"      , "urunler@galeriSet" )   ->name("galeri.post");
        Route::get  ( "/sil/{id}"         , "urunler@delete"    )   ->name("sil");
        Route::get  ( "/status/{id}"      , "urunler@status"    )   ->name("status");
        Route::get  ( "/fotoStatus/{id}"  , "urunler@fotoStatus")   ->name("fotoStatus");
        Route::get  ( "/fotoSil/{id}"     , "urunler@fotoDelete")   ->name("fotoSil");
        Route::get  ( "/search"           , "search@index"      )   ->name("search");

    });

    // Renkler Route** /

    Route::group(["prefix"=>"renkler","as"=>"renkler."],function() {

        Route::get  ( "/"                 , "renkler@index"    )   ->name("index");
        Route::get  ( "/ekleForm"         , "renkler@create"   )   ->name("ekleForm");
        Route::post ( "/ekle"             , "renkler@store"    )   ->name("ekle.post");
        Route::get  ( "/sil/{id}"         , "renkler@delete"   )   ->name("sil");
    });


    // Kategoriler Route** /

    Route::group(["prefix"=>"kategoriler","as"=>"kategoriler."],function() {

        Route::get  ( "/"                 , "kategoriler@index"    )   ->name("index");
        Route::get  ( "/ekleForm"         , "kategoriler@create"   )   ->name("ekleForm");
        Route::post ( "/ekle"             , "kategoriler@store"    )   ->name("ekle.post");
        Route::get  ( "/sil/{id}"         , "kategoriler@delete"   )   ->name("sil");
    });







});

