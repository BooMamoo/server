<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapping extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

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

    public function standard()
    {
        return $this->hasOne('App\Standard', 'id', 'type_id');
    }
}
