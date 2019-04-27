<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    //
    protected $fillable = [ 'slug', 'desc', 'titre' ];


    public function reps()
    {
       return $this->belongsToMany('App\Salle');
    }

}
