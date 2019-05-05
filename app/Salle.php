<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $fillable = [ 'slug', 'adress', 'nom','sieges_complet' ];




    public function theatres()
    {
       return $this->belongsToMany('App\Theatre', 'reps');
    }

    public function reps()
    {
       return $this->hasMany('App\Rep');
    }

    protected function sieges(){

    return $this->hasMany('App\Siege');

    }



    

}
