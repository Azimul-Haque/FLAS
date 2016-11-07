<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    public function applications()
	{
	    return $this->belongsTo('App\Application', 'application_id');
	}
}
