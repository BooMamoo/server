<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	protected $hidden = ['created_at', 'updated_at', 'pivot'];
}