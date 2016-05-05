<?php

use Illuminate\Database\Seeder;

class GatewayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gateways')->insert(array([
            'id' => 1,
            'name' => 'Wifi.py',
            'owner' => 'Boo Mamoo',
            'path' => 'file/Wifi.py',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 2,
            'name' => 'Bluetooth.py',
            'owner' => 'Boo Mamoo',
            'path' => 'file/Bluetooth.py',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 3,
            'name' => 'MRF.py',
            'owner' => 'Boo Mamoo',
            'path' => 'file/MRF.py',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 4,
            'name' => 'MQTT.py',
            'owner' => 'Boo Mamoo',
            'path' => 'file/MQTT.py',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]));
    }
}