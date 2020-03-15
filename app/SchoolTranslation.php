<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description'];

}//end of model
