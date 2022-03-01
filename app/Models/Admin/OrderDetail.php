<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "order";

    protected $guarded = [];

//    public function siparisler(){
//
//        return $this->belongsTo(SiparislerModel::class);
//
//    }

}
