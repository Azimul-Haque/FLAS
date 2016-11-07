<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function user()
	{
	    return $this->belongsTo('App\User', 'created_by_id', 'id');
	}

	public function inspections()
    {
        return $this->hasOne('App\Inspection', 'application_id');
    }	

    public function application_status()
	{
	    return $this->belongsTo('App\ApplicationStatus', 'application_status_id', 'id');
	}
}
