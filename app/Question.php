<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillabe=[
    	'subject_id','name','status'
    ];

    public function subject(){
    	return $this->belongsTo('App\Subject');
    }

}
