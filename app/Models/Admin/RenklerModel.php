<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenklerModel extends Model
{
    protected $table = "renkler";

    protected $guarded = [];

    public function urunler(){

        return $this->hasMany(UrunlerModel::class);

    }
}
