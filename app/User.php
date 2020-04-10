<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type'
    ];


    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get first name

    public function schools(){

        return $this->hasMany(School::class);
    }

    public function students(){

        return $this->belongsToMany(Student::class,'student_user')->withPivot('grades')->withTimestamps();;
    }

}//end of model
