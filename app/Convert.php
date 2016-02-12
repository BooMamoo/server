<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Convert extends Model
{
	protected $hidden = ['created_at', 'updated_at'];

    public function getTimestampAttribute()
	{
		$date = New Carbon($this->attributes['timestamp'], 'Asia/Bangkok');
    	
    	return $date->toIso8601String();
	}
}
