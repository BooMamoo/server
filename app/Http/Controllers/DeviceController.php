<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Device;
use App\Local;
use App\Mapping;
use App\Convert;

class DeviceController extends Controller
{
    public function local()
    {
        $locals = Local::All();

        return $locals;
    }

    public function device($local_id)
    {
        $devices = Device::where('local_id', '=', $local_id)->get();

        return $devices;
    }

    public function info($device_id)
    {
        $device = Device::with('local')->find($device_id);
        $mappings = Mapping::with(array('type', 'standard'))->where('device_id', '=', $device_id)->get();
        $device->mappings = $mappings;

        return $device;
    }

    public function getData($device_id, $type_id)
    {
        $data = Convert::where('device_id', '=', $device_id)->where('type_id', '=', $type_id)->get();

        return $data;
    }
}
