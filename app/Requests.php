<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    public function add($name,$phone) {

        $person=new Requests;
        $person->name = $name;
        $person->phone = $phone;
        $person->save();        
    }//
    
    public function del($id) {
        Requests::destroy($id);      
    }
}
