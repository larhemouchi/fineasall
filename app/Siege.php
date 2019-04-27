<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siege extends Model
{


	protected $fillable =['cat_id', 'num','map', 'salle_id'];
    
    protected function cat(){

	    $this->belongsTo('App\Cat');

    }

    protected function res(){

    	$this->hasMany('App\Res');

    }

}
