<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillabe=[
    	'name'
    ];

    public function subjects(){
    	return $this->hasMany('App\Subject');
    }
}
