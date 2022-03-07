<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavorilerModel extends Model
{
    protected $table = "favoriler";

    protected $guarded = [];

    public function urunler(){

        return $this->belongsTo(UrunlerModel::class);
    }

}


