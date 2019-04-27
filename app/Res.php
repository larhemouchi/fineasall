<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Res extends Model
{
    protected $fillable = [
    	'rep_id', 'siege_id', 'user_id'
    ];

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
