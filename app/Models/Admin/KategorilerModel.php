<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategorilerModel extends Model
{
    protected $table = "kategoriler";

    protected $guarded = [];

    public function childs() {

        return $this->hasMany(KategorilerModel::class,'parent_id','id') ;

    }

    public function urunler(){

        return $this->hasMany(UrunlerModel::class);

    }

}
