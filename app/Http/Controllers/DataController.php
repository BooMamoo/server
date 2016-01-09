<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Device;
use App\Mapping;
use App\Local;

class DataController extends Controller
{
	public function storeData(Request $request)
	{
		$parameter = $request->input('parameter');
		$local = $request->input('local');
		$data = $request->input('data');

		$local = Local::where('name', '=', $local)->get();

		switch ($parameter) {
			case 'device':
				$device = new Device;
				$device->id = (int)($data['id']) + (int)($local[0]->constant);
		    	$device->name = $data['name'];
		    	$device->location = $data['location'];
		    	$device->interval = $data['interval'];
		    	$device->local_id = $local[0]->id;
		    	$device->save();

				break;
			case 'mapping':
				$mapping = new Mapping;
		    	$mapping->device_id = (int)($data['device_id']) + (int)($local[0]->constant);
		    	$mapping->type_id = $data['type_id'];
		    	$mapping->unit_id = $data['unit_id'];
		    	$mapping->save();

				break;
			default:
				break;
		}

		// return 'true';
	}
}
