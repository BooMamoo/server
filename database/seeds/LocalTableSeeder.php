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
            'place' => 'Bang Kapi',
            'latitude' => 13.770088,
            'longitude' => 100.63654829999996,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 2,
            'name' => 'Local B',
            'constant' => 500,
            'place' => 'AMT Ladprow',
            'latitude' => 13.7956729,
            'longitude' => 100.6358626,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]));
    }
}