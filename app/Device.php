<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function local()
    {
    	return $this->hasOne('App\Local', 'id', 'local_id');
    }
}
