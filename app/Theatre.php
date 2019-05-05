<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    //
    protected $fillable = [ 'slug', 'desc', 'titre' , 'img'];


    public function salles()
    {
       return $this->belongsToMany('App\Salle', 'reps');
    }

    public function reps()
    {
       return $this->hasMany('App\Rep');
    }

}
