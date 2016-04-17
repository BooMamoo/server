<?php 

namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	protected $hidden = ['created_at', 'updated_at', 'pivot'];
}