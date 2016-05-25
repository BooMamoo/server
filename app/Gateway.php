<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
    	return $this->hasOne('App\User', 'id', 'user_id');
    }
}
