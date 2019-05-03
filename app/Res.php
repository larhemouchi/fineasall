<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Res extends Model
{
    protected $fillable = [
    	'rep_id', 'siege_id', 'user_id'
    ];

   public function titre(){

      //$re->rep->theatre->titre
      return $this->user->nom .'à reservé le siége n° '. $this->siege->num.' dans la salle '. $this->rep->salle->nom .' pour voire le théatre : '. $this->rep->theatre->titre ;
   }

    public function siege()
    {
       return $this->belongsTo('App\Siege');
    }


    public function rep()
    {
       return $this->belongsTo('App\Rep');
    }

    public function user()
    {
       return $this->belongsTo('App\User');
    }


}
