<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role;
use App\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array([
        	'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@website.com',
            'password' => Hash::make('admin'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
        	'id' => 2,
            'name' => 'Member',
            'email' => 'member@website.com',
            'password' => Hash::make('member'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]));

        $admin = new Role();
		$admin->name = 'admin';
		$admin->display_name = 'User Administrator';
		$admin->description = 'User is allowed to manage and edit other users';
		$admin->save();

		$member = new Role();
		$member->name = 'member';
		$member->display_name = 'Member';
		$member->description = 'User is a member';
		$member->save();

		$user = User::where('name', '=', 'Admin')->first();
		$user->attachRole($admin);

		$user = User::where('name', '=', 'Member')->first();
		$user->attachRole($member);

		$addLocal = new Permission();
		$addLocal->name = 'add-local';
		$addLocal->display_name = 'Add Local Site';
		$addLocal->description = 'add new local site';
		$addLocal->save();

        $viewContent = new Permission();
        $viewContent->name = 'view-content';
        $viewContent->display_name = 'View Content';
        $viewContent->description = 'view content in system';
        $viewContent->save();

		$admin->attachPermission($addLocal);
        $admin->attachPermission($viewContent);
        $member->attachPermission($viewContent);
    }
}
