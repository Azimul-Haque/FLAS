<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    public function applications()
    {
        return $this->hasOne('App\Application', 'id', 'application_status_id');
    } 
}
