<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['name'];

    public function schools()
    {
        return $this->hasMany(School::class);

    }//end of schools

}//end of model
