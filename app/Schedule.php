<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;

class Schedule extends Model
{
    public function add($name,$date,$places,$active,$id_admin) {
         
        $schedule=new Schedule;
        $schedule->name = $name;
        $schedule->date = $date;
        $schedule->places = $places;
        if ($active==NULL)
        {
            $schedule->active=0;
        }
        else{
            $schedule->active = $active;
        }
        $schedule->id_admin = $id_admin;
        
        
        $schedule->save();
    }
    
    public function edit($id,$name,$date,$places,$active,$id_admin) {
         
        $schedule=Schedule::find($id);
        $schedule->name = $name;
        $schedule->date = $date;
        $schedule->places = $places;
        if ($active==NULL)
        {
            $schedule->active=0;
        }
        else{
            $schedule->active = $active;
        }
        $schedule->id_admin = $id_admin;
        
        
        $schedule->save();
    }
    
    public function del($id) {
        $person = Schedule::find($id)->person()->get();
        for ($i=0; $i < $person->count(); $i++)
        {
            $person[$i]->id_schedule=NULL;
            $person[$i]->save();
        }
        Schedule::destroy($id);
    }
    
    public function translate($date) {
        
        if ($date==1)
            {
                $date='Января';
            }
        if ($date==2)
            {
                $date='Февраля';
            }
        if ($date==3)
            {
                $date='Марта';
            }
        if ($date==4)
            {
                $date='Апреля';
            }
        if ($date==5)
            {
                $date='Мая';
            }
        if ($date==6)
            {
                $date='Июня';
            }
        if ($date==7)
            {
                $date='Июля';
            }
        if ($date==8)
            {
                $date='Августа';
            }
        if ($date==9)
            {
                $date='Сентября';
            }
        if ($date==10)
            {
                $date='Октября';
            }
        if ($date==11)
            {
                $date='Ноября';
            }
        if ($date==12)
            {
                $date='Декабря';
            }
            return $date;
    }
    
    public function user()
    {
      return $this->belongsTo('App\User','id_admin','id');
    }
    
    public function person()
    {
      return $this->hasMany('App\Person','id_schedule','id');
    }
}
