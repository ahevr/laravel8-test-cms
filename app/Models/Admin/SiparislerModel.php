<?php

namespace App\Models\Admin;

use App\Models\Uye;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiparislerModel extends Model
{
    protected $table = "siparisler";

    protected $guarded = [];


    public function urunler(){

        return $this->belongsTo(UrunlerModel::class);
    }


}
