<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

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






















    public function setImageAttribute($value){
        if($value) {
            $destination = "tema/admin/uploads/urunler/".$this->image;
            if (File::exists($destination)){

                File::delete($destination);

            }
            $file = $value;
            $extention = $file->getClientOriginalExtension();
            $filename = time(). "." .$extention;
            $file->move("tema/admin/uploads/urunler/",$filename);
            $this->attributes['image'] = $filename;
        }
    }
}
