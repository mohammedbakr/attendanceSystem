<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'email', 'password','major','stage','school_id'
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
