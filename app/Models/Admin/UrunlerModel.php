<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrunlerModel extends Model
{
    protected $table = "urunler";

    protected $guarded = [];

    public function kategoriler(){

        return $this->belongsTo(KategorilerModel::class);

    }

    public function renkler(){

        return $this->belongsTo(RenklerModel::class);

    }
}
