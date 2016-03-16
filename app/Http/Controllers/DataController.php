<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Device;
use App\Mapping;
use App\Local;
use App\Convert;
use App\Standard;
use App\Unit;
use GuzzleHttp\Client;

class DataController extends Controller
{
	public function storeData(Request $request)
	{
		$parameter = $request->input('parameter');
		$local = $request->input('local');
		$data = json_decode($request->input('data'));

		$local = Local::where('name', '=', $local)->get();

		switch ($parameter) {
			case 'device':
				$device = new Device;
				$device->id = (int)($data->id) + (int)($local[0]->constant);
		    	$device->name = $data->name;
		    	$device->location = $data->location;
		    	$device->interval = $data->interval;
		    	$device->local_id = $local[0]->id;
		    	$device->save();

				break;

			case 'mapping':
				$mapping = new Mapping;
				$mapping->id = (int)($data->id) + (int)($local[0]->constant);
		    	$mapping->device_id = (int)($data->device_id) + (int)($local[0]->constant);
		    	$mapping->type_id = $data->type_id;
		    	$mapping->unit_id = $data->unit_id;
		    	$mapping->min_threshold = $data->min_threshold;
		    	$mapping->max_threshold = $data->max_threshold;
		    	$mapping->save();

				break;

			case 'data':
				$mapping_id = (int)($data->mapping_id) + (int)($local[0]->constant);
				$mapping = Mapping::where('id', '=', $mapping_id)->get();
				$device_id = $mapping[0]->device_id;
				$type_id = $mapping[0]->type_id;
				$unit = Unit::find($mapping[0]->unit_id)->unit;

				$convert = new Convert;
				$convert->device_id = $device_id;
				$convert->type_id = $type_id;
				$convert->value = $this->convert($data->value, $type_id, $unit);
				$convert->timestamp = $data->timestamp;
				$convert->save();

				break;

			default:
				break;
		}

		return 'true';
	}

	public function editData(Request $request)
	{
		$parameter = $request->input('parameter');
		$local = $request->input('local');
		$data = json_decode($request->input('data'));

		$local = Local::where('name', '=', $local)->get();

		switch ($parameter) {
			case 'device':
				$device = Device::find((int)($data->id) + (int)($local[0]->constant));
		    	$device->name = $data->name;
		    	$device->location = $data->location;
		    	$device->interval = $data->interval;
		    	$device->save();

				break;

			case 'mapping':
				$mapping = Mapping::find((int)($data->id) + (int)($local[0]->constant));

				if($mapping == null)
				{
					$mapping = new Mapping;
					$mapping->id = (int)($data->id) + (int)($local[0]->constant);
			    	$mapping->device_id = (int)($data->device_id) + (int)($local[0]->constant);
			    	$mapping->type_id = $data->type_id;
			    	$mapping->unit_id = $data->unit_id;
			    	$mapping->min_threshold = $data->min_threshold;
		    		$mapping->max_threshold = $data->max_threshold;
			    	$mapping->save();
			    }
			    else
			    {
			    	$mapping->type_id = $data->type_id;
			    	$mapping->unit_id = $data->unit_id;
			    	$mapping->min_threshold = $data->min_threshold;
		    		$mapping->max_threshold = $data->max_threshold;
			    	$mapping->save();
			    }

				break;

			default:
				break;
		}

		return 'true';
	}

	public function deleteData(Request $request)
	{
		$parameter = $request->input('parameter');
		$local = $request->input('local');
		$data = json_decode($request->input('data'));

		$local = Local::where('name', '=', $local)->get();

		switch ($parameter) {
			case 'device':
				$device = Device::find((int)($data->id) + (int)($local[0]->constant));
		    	$device->delete();

				break;

			case 'mapping':
				$mapping = Mapping::find((int)($data->id) + (int)($local[0]->constant));
				$mapping->delete();

				break;

			default:
				break;
		}

		return 'true';
	}

	public function convert($value, $type, $unit)
	{
		switch ($type) {
			case '1': # Brightness
				switch ($unit) {
					case 'Lumen':
						return $value;

					case 'Lux':
						return $value;

					default:
						break;
				}

				break;

			case '2': # Humidity
				switch ($unit) {
					case 'Gram per Square Meter (g/m^2)':
						return $value;

					default:
						break;
				}

				break;

			case '3': # Pressure
				switch ($unit) {
					case 'Millibars':
						return $value;

					case 'Kilo Pascals':
						return $value = (float)($value) * 10;

					case 'Hecto Pascals':
						return $value;

					case 'Milimeter of Mercury (Torr)':
						return $value = (float)($value) / 0.75;

					case 'Inch of Mercury':
						return $value = (float)($value) / 0.03;

					case 'Pounds per Mercury':
						return $value = (float)($value) / 0.01;

					default:
						break;
				}

				break;

			case '4': # Rain
				switch ($unit) {
					case 'Milimeter (mm)':
						return $value;

					case 'Centimeter (cm)':
						return $value = (float)($value) * 10;

					case 'Meter (m)':
						return $value = (float)($value) * 1000;

					case 'Kilometer (km)':
						return $value = (float)($value) * 1000000;

					default:
						break;
				}

				break;

			case '5': # Temperature
				switch ($unit) {
					case 'Celsius (C)':
						return $value;

					case 'Fahrenheit (F)':
						return $value = (5 / 9) * ((float)($value) - 32);

					case 'Kelvin (K)':
						return $value = (float)($value) - 273.15;

					case 'Rankine (R)':
						return $value = ((float)($value) - 491.67) * (5 / 9);

					case 'Rormer (Re)':
						return $value = (float)($value) * 1.25;

					default:
						break;
				}

				break;
			
			case '6': # Wind
				switch ($unit) {
					case 'Foot per Second (ft/s)':
						return $value = ((float)($value) * 3.6) / 3.280839895;

					case 'Meter per Second (m/s)':
						return $value = (float)($value) * 3.6;

					case 'Kilometer per Hour (km/hr)':
						return $value;

					case 'Mile per Hour (mph)':
						return $value = ((float)($value) * 3.6) / 2.2;

					case 'Knots':
						return $value = ((float)($value) * 3.6) / 1.9;

					default:
						break;
				}

				break;

			default:
				break;
		}

		return $value;
	}
}