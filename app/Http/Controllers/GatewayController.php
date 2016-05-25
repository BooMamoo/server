<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;
use Auth;
use App\Gateway;

class GatewayController extends Controller
{
    public function index()
    {
        $header = app('request')->header();
        
        if(!$this->check($header))
        {
            return response('Unauthorized', 401);
        }

        $gateways = Gateway::with('user')->get();

        return $gateways;
    }

    public function store(Request $request)
	{
        $path = config('path');
		$header = app('request')->header();

        if(!$this->check($header))
        {
            return response('Unauthorized', 401);
        }
        else
        {
            $user = Auth::user();
            $user_id = $user->id;
            $name = $request->input('name');
            $contents = $request->input('contents');
            $path_file = 'file/' . $name;

            $file_name = $path . 'public/file/' . $name;

			touch($file_name);
    		chmod($file_name, 0777);
			$open = fopen($file_name, "w") or die ("Unable to open file!");
			fwrite($open, implode($contents));
			fclose($open);

            $gateway = new Gateway;
            $gateway->name = $name;
            $gateway->path = $path_file;
            $gateway->user_id = $user_id;
            $gateway->save();

			return "true";
		}
	
		return "Error";
	}

    public function download($gateway_id)
    {
        $header = app('request')->header();
        
        if(!$this->check($header))
        {
            return response('Unauthorized', 401);
        }

        $gateway = Gateway::find($gateway_id);
        $gateway->content = File::get($gateway->path);
        
        return $gateway;
    }

    public function check($request)
    {
        $email = $request['php-auth-user'][0];
        $password = $request['php-auth-pw'][0];

        $check = Auth::attempt(['email' => $email, 'password' => $password]);

        return $check;
    }
}
