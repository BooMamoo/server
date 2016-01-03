<?php

use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert(array([
    		'id' => 1,
            'type_id' => 1,
            'unit' => 'Lumen',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 2,
            'type_id' => 1,
            'unit' => 'Lux',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 3,
            'type_id' => 2,
            'unit' => 'Gram per Square Meter (g/m^2)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 4,
            'type_id' => 3,
            'unit' => 'Millibars',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 5,
            'type_id' => 3,
            'unit' => 'Kilo Pascals',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 6,
            'type_id' => 3,
            'unit' => 'Hecto Pascals',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 7,
            'type_id' => 3,
            'unit' => 'Milimeter of Mercury (Torr)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 8,
            'type_id' => 3,
            'unit' => 'Inch of Mercury',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 9,
            'type_id' => 3,
            'unit' => 'Pounds per Mercury',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 10,
            'type_id' => 4,
            'unit' => 'Milimeter (mm)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 11,
            'type_id' => 4,
            'unit' => 'Centimeter (cm)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 12,
            'type_id' => 4,
            'unit' => 'Meter (m)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 13,
            'type_id' => 4,
            'unit' => 'Kilometer (km)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 14,
            'type_id' => 5,
            'unit' => 'Celsius (C)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 15,
            'type_id' => 5,
            'unit' => 'Fahrenheit (F)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 16,
            'type_id' => 5,
            'unit' => 'Kelvin (K)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 17,
            'type_id' => 5,
            'unit' => 'Rankine (R)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 18,
            'type_id' => 5,
            'unit' => 'Rormer (Re)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 19,
            'type_id' => 6,
            'unit' => 'Foot per Second (ft/s)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 20,
            'type_id' => 6,
            'unit' => 'Meter per Second (m/s)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 21,
            'type_id' => 6,
            'unit' => 'Kilometer per Hour (km/hr)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 22,
            'type_id' => 6,
            'unit' => 'Mile per Hour (mph)',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 23,
            'type_id' => 6,
            'unit' => 'Knots',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]));
    }
}
