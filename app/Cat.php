<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;


class Cat extends Model
{
    use NodeTrait;


    protected $fillable = ['nom', 'lettre', 'taux'];

    protected function sieges(){

    	return $this->hasMany('App\Siege');

    }


}
