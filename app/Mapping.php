<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapping extends Model
{
    public function device()
    {
    	return $this->hasOne('App\Device', 'id', 'device_id');
    }

    public function type()
    {
    	return $this->hasOne('App\Type', 'id', 'type_id');
    }

    public function unit()
    {
    	return $this->hasOne('App\Unit', 'id', 'unit_id');
    }
}
