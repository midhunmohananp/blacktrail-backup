<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{

    public $timestamps = false;
    

    public function criminals()
    {
    	return $this->belongsToMany(Criminal::class,'crime_criminal');
    }

}
