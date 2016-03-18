<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Local;

class AdminController extends Controller
{
    public function local(Request $request)
    {
    	$name = $request->input('name');
        $place = $request->input('place');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $local = new Local;
        $local->name = $name;
        $local->place = $place;
        $local->latitude = $latitude;
        $local->longitude = $longitude;
        $local->save();
        $local->constant = (int)$local->id * 500;
        $local->save();

        return "true";
    }
}
