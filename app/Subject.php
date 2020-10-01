<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillabe=[
    	'category_id','name','photo'
    ];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function questions(){
    	return $this->hasMany('App\Question');
    }


}
