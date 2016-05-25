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
            'path' => 'file/Wifi.py',
            'user_id' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 2,
            'name' => 'Bluetooth.py',
            'path' => 'file/Bluetooth.py',
            'user_id' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 3,
            'name' => 'MRF.py',
            'path' => 'file/MRF.py',
            'user_id' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],[
            'id' => 4,
            'name' => 'MQTT.py',
            'path' => 'file/MQTT.py',
            'user_id' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]));
    }
}