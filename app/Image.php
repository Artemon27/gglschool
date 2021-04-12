<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as ImageInt;
use Illuminate\Support\Facades\File;
use App\Girl;

class Image extends Model
{
    static public function add($name,$extension,$id_cat,$id_dop) {
        $image=new Image;
        $image->image = $name.'.'.$extension;
        $image->image_mini = $name.'_mini.'.$extension;
        $image->id_cat = $id_cat;
        $image->id_dop = $id_dop;
        $image->save();
    }
    
    static public function del($id) {
        $image = Image::find($id);
        File::delete(public_path($image->image));
        File::delete(public_path($image->image_mini));     
        Image::destroy($id);
    }
    
    public function girl()
    {
      return $this->belongsTo('App\Girl','id_dop','id')->where('id_cat','=',2)->withDefault();
    }
}
