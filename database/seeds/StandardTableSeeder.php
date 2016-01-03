<?php

use Illuminate\Database\Seeder;

class StandardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('standards')->insert(array([
            'id' => 1,
            'type_id' => 1,
            'unit' => 'Lux',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 2,
            'type_id' => 2,
            'unit' => 'Gram per Square Meter (g/m^2)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 3,
            'type_id' => 3,
            'unit' => 'Millibars',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 4,
            'type_id' => 4,
            'unit' => 'Milimeter (mm)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 5,
            'type_id' => 5,
            'unit' => 'Celsius (C)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 6,
            'type_id' => 6,
            'unit' => 'Kilometer per Hour (km/hr)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]));
    }
}
