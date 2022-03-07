<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrunlerImageModel extends Model
{
    protected $table = "urunler_image";

    protected $guarded = [];

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
