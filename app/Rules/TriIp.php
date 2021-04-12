<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;

class TriIp implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $user=User::where('ipreg','=',$value)->get()->count();
        if ($user>2)
        {
         return false;
        }
       else 
         return true;
    }        
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Слишком много аккаунтов';
    }
}
