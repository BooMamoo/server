<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $hidden = ['constant', 'created_at', 'updated_at'];
}
