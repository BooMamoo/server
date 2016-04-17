<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Local;
use Auth;

class AdminController extends Controller
{
    public function local(Request $request)
    {
        $header = app('request')->header();
        $email = $header['php-auth-user'][0];
        $password = $header['php-auth-pw'][0];

        $check = Auth::attempt(['email' => $email, 'password' => $password]);

        if(!$check)
        {
            return response('Unauthorized', 401);
        }
        else
        {
            $user = Auth::user();

            if($user->hasRole('admin'))
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
            else
            {
                return response('Unauthorized', 401);
            }
        }
    }
}
