<?php
namespace App\Helper;
use File;
use Image;
class imageUpload{

    static function singleUpload($name,$directory,$file){

        $rand = $name;
        $dir = "tema/admin/uploads/".$directory."/".$rand;
        $dirLarge = $dir."/large";

        if (!empty($file)){

            if (!File::exists($dir)){

                File::makeDirectory($dir,0755,true);
            }
            if (!File::exists($dirLarge)){

                File::makeDirectory($dirLarge,0755,true);
            }

            $filename =$file->getClientOriginalName();
            $path  = public_path($dir."/".$filename);
            $path2 = public_path($dirLarge."/".$filename);

            Image::make($file->getRealPath())->save($path2);
            Image::make($file->getRealPath())->save($path);

            return $dir."/".$filename;
        } else {

            return "";

        }

    }

    static function singleUploadUpdate($name,$directory,$file,$data,$field){

        $rand = $name;
        $dir = "tema/admin/uploads/".$directory."/".$rand;
        $dirLarge = $dir."/large";

        if (!empty($file)){

            if (!File::exists($dir)){

                File::makeDirectory($dir,0755,true);
            }
            if (!File::exists($dirLarge)){

                File::makeDirectory($dirLarge,0755,true);
            }

            File::delete("public/".$data[0][$field]);
            $filename =$file->getClientOriginalName();
            $path  = public_path($dir."/".$filename);
            $path2 = public_path($dirLarge."/".$filename);

            Image::make($file->getRealPath())->save($path2);
            Image::make($file->getRealPath())->resize(600,800)->save($path);

            return $dir."/".$filename;
        } else {

            return $data[0][$field];

        }

    }


}
