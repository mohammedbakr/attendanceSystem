<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;


class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','major','school_id'
    ];


    public function school(){

        return $this->belongsTo(School::class);
    }

    public function users(){

        return $this->belongsToMany(User::class,'student_user')->withPivot('grades');
    }


    public function attendances(){

        return $this->hasMany(Attendance::class);
    }


}//end of model
