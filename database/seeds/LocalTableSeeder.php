<?php

use Illuminate\Database\Seeder;

class LocalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locals')->insert(array([
            'id' => 1,
            'name' => 'Local A',
            'constant' => 0,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 2,
            'name' => 'Local B',
            'constant' => 500,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]));
    }
}
