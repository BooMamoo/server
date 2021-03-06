<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(StandardTableSeeder::class);
        $this->call(LocalTableSeeder::class);
        $this->call(GatewayTableSeeder::class);

        Model::reguard();
    }
}
