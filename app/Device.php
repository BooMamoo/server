<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
	protected $hidden = ['created_at', 'updated_at'];

    public function local()
    {
    	return $this->hasOne('App\Local', 'id', 'local_id');
    }
}
