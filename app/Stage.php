<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);

    }//end of products

}//end of model
