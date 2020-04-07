<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = [];

    public function student(){

        return $this->belongsTo(Student::class);
    }

    public function scopeAttended($query)
    {
        return $query->where('attended', 1);
    }
}
