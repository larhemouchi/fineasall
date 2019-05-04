<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rep extends Model
{
    protected $fillable = ['theatre_id','salle_id','dateheure', 'prix'];


      


    public function titre(){
       return $this->theatre->titre  ;
    }


    public function salle()
    {
       return $this->belongsTo('App\Salle');
    }


    public function theatre()
    {
       return $this->belongsTo('App\Theatre');
    }

    protected function res(){

    	return $this->hasMany('App\Res');

    }


}
