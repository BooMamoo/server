<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
	protected $hidden = ['created_at', 'updated_at'];

    public function type()
    {
    	return $this->hasOne('App\Type', 'id', 'type_id');
    }
}
