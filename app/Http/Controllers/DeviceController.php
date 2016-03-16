<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Device;
use App\Local;
use App\Mapping;
use App\Convert;
use App\Standard;
use DB;

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
        $data = Device::find($device_id);
        $data->standard = Standard::with('type')->where('type_id', '=', $type_id)->get();
        $data->convert = Convert::where('device_id', '=', $device_id)->where('type_id', '=', $type_id)->get();
        
        return $data;
    }

    public function getCurrentData($device_id, $type_id)
    {
        $current = Convert::where('device_id', '=', $device_id)->where('type_id', '=', $type_id)->orderBy('timestamp', 'desc')->first();

        return $current;
    }

    public function chart($device_id, $type_id)
    {
        $chart = Device::find($device_id);
        $chart->standard = Standard::with('type')->where('type_id', '=', $type_id)->get();
        $chart->chart = Convert::select(DB::raw('*, HOUR(timestamp) as hour'))->where('device_id', '=', $device_id)->where('type_id', '=', $type_id)->whereRaw('DATE(timestamp) = CURDATE()')->groupBy('hour')->get();
        $chart->threshold = Mapping::select('min_threshold', 'max_threshold')->where('device_id', '=', $device_id)->where('type_id', '=', $type_id)->get();
        
        return $chart;
    }
}
