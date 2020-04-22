<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','major','school_id','type'
    ];
    

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get first name

    public function school(){

        return $this->belongsTo(School::class);
    }

    public function users(){

        return $this->belongsToMany(User::class,'student_user')->withPivot('grades')->withTimestamps();;
    }

    public function attendances(){

        return $this->hasMany(Attendance::class);
    }

}//end of model
