<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $fillable = [ 'slug', 'adress', 'nom','sieges_complet' ];




    public function reps()
    {
       return $this->belongsToMany('App\Theatre');
    }

    protected function sieges(){

    return $this->hasMany('App\Siege');

    }

    

}
