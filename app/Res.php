<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Voiding;
class Res extends Model
{
    protected $fillable = [
    	'rep_id', 'siege_id', 'user_id'
    ];

   public function titre(){



      //$re->reheatre->titre
      return $this->user->nom .' '.$this->user->prenom.' à reservé le siége n° '. $this->siege->num.' pour voir  le théatre : '. $this->rep->theatre->titre ;
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
