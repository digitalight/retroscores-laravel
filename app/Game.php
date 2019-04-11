<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	protected $guarded = [];
    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    public function highestscore()
    {
    	
    }

    public function system()
    {
        return $this->belongsTo('App\System');
    }
}
