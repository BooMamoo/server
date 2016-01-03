<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert(array([
    		'id' => 1,
            'type' => 'Brightness',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 2,
            'type' => 'Humidity',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 3,
            'type' => 'Pressure',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 4,
            'type' => 'Rain',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 5,
            'type' => 'Temperature',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 6,
            'type' => 'Wind',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]));
    }
}
