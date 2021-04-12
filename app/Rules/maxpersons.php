<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Schedule;
use App\Person;

class maxpersons implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id=$id;
    }
   
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($this->id!=NULL){
            $oldSchedule = Person::find($this->id)->id_schedule;
            if ($value == $oldSchedule)
                return true;
        }
        $schedule = Schedule::find($value);
        if($schedule==NULL)
        {
            return true;
        }
        if ($schedule->places > $schedule->persons)
        {
         return true;
        }
        else 
        return false;
    }        
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Курс переполнен';
    }
}
