<?php

namespace App;

use App\Schedule;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    
     public function add($schedule,$name,$surname,$patronymic,$phone,$email,$notice,$id_admin) {

        $person=new Person;
        $person->id_schedule = $schedule;
        $person->name = $name;
        $person->surname = $surname;
        $person->patronymic = $patronymic;
        $person->phone = $phone;
        $person->email = $email;
        $person->notice = $notice;
        $person->id_admin = $id_admin;  
        $person->del = 0;
        if($person->schedule->id==NULL)
        {
            $person->save();
        }
        else{
            $person->schedule->persons++;
            $person->schedule->save();
            $person->save();
        }
        
        
    }
    
    public function edit($id,$schedule,$name,$surname,$patronymic,$phone,$email,$notice,$id_admin) {
         
        $person=Person::find($id);
        if ($person->id_schedule != $schedule)
        {
            if($person->schedule->id!=NULL)
            {
                $person->schedule->persons--;
                $person->schedule->save();  
            }                      
            if ($schedule!=0)
            {
                $TempSched = Schedule::find($schedule);
                $TempSched -> persons ++;
                $TempSched -> save();

            }
        }
        $person->id_schedule = $schedule;      
        
        
        
        $person->name = $name;
        $person->surname = $surname;
        $person->patronymic = $patronymic;
        $person->phone = $phone;
        $person->email = $email;
        $person->notice = $notice;
        $person->id_admin = $id_admin;        
        
        $person->save();
    }
    
    public function deltemp($id) {
        $person=Person::find($id);
        $person->schedule->persons--;
        $person->schedule->save();
        
        $person->del=1;
        $person->id_schedule=NULL;
        $person->save();
    }
    
    
    public function del($id) {
        $TempSched=Person::find($id)->schedule;
        if($TempSched->id==NULL){
            Person::destroy($id);
        }
        else{
        $TempSched->persons--;
        $TempSched->save();
        Person::destroy($id);
        }
        
    }
    
    public function schedule()
    {
      return $this->belongsTo('App\Schedule','id_schedule','id')->withDefault();
    }
    
    public function user()
    {
      return $this->belongsTo('App\User','id_admin','id');
    }
}
