<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{

    protected $guarded = [];

    public function users(){

        return $this->belongsToMany(User::class, 'school_user');
    }

    public function students(){

        return $this->hasMany(Student::class);
    }

    public function students_count()
    {
        return Student::where('school_id', [$this->id])->count();
    }
  

}//end of model
