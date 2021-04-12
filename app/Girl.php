<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;

class Girl extends Model
{
    static public function add($name,$curs,$vk,$inst,$desc) {
        $girl=new Girl;
        $girl->name = $name;
        $girl->curs = $curs;
        $girl->description = $desc;
        $girl->vk = $vk;
        $girl->instagram = $inst;
         
        $girl->save();
        return $girl->id;
       
    }
    
    static public function edit($id,$name,$curs,$vk,$inst,$desc) {
        $girl=Girl::find($id);
        $girl->name = $name;
        $girl->curs = $curs;
        $girl->description = $desc;
        $girl->vk = $vk;
        $girl->instagram = $inst;
         
        $girl->save();
        return $girl->id;
       
    }
    
    static public function del($id) {
        Girl::destroy($id);       
    }
    
    
    //
    public function avatar()
    {
      return $this->hasOne('App\Image','id_dop','id')->where('id_cat','=',2);
    }
    public function images()
    {
      return $this->hasMany('App\Image','id_dop','id')->where('id_cat','=',3);
    }
}
