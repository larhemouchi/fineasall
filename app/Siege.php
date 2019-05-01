<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siege extends Model
{


	protected $fillable =['cat_id', 'num','map', 'salle_id'];
    
    protected function cat(){

	    return $this->belongsTo('App\Cat');

    }

    protected function res(){

    	return $this->hasMany('App\Res');

    }

}
