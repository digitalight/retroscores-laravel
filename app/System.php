<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
	protected $guarded = [];
    public function games()
    {
        return $this->hasMany('App\Game');
    }
}
