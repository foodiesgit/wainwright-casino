<?php

namespace Wainwright\CasinoDog;
use Wainwright\CasinoDog\Controllers\Livewire\AlertBanner;
use Illuminate\Http\Request;

class CasinoDog
{
    /*
       Sends global (to anyone) alert message at top of page
    */
    public function send_alert($message) {
        $alert = new AlertBanner();
        $alert->alert($message);
    }

    /*
       Toggleable within config/casino-dog.php
    */
    public function register_enabled() {
        return config('casino-dog.register_enabled');
    }

    /*
       Datalogger
    */
    public static function logger($data, $type, $extra_data = NULL)
    {
        DataLogger::save_log($type, $data, $extra_data);
    }

    /*
       Check "is_admin" state on user
       You can use anywhere in laravel as: CasinoDog::check_admin(auth()->user());
    */
    public function check_admin($user)
    {
        if($user->is_admin === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function morph_array($data)
    {
        if ($data instanceof Arrayable) {
            return $data->toArray();
        }
        if ($data instanceof JsonSerializable) {
            return $data->jsonSerialize();
        }
        return $data;
    }

    public static function requestIP(Request $request)
    {
        $ip = $request->header('CF-Connecting-IP');
        if($ip === NULL || !$ip) {
            $ip = $_SERVER['REMOTE_ADDR'];
            if($ip === NULL) {
              $ip = $request->ip();
            }
        }
        return $ip;
    }

    /*
       Display error page to frontend customizable per game provider.
       You can edit error page on /resources/views.
       Usage Example: return \Wainwright\CasinoDog\BaseFunctions\BaseFunctions::errorRouting(401, 'Failed to create player.');
    */
    public static function errorRouting($statuscode, $message = NULL, $errorType = NULL, $data = NULL)
    {
        //Array with meta
        if($message !== NULL) {
            $message = array(
                'status' => $statuscode,
                'message' => $message,
                'type' => $errorType,
                'data' => $data,
            );
        } else {
                $message = array(
                'status' => $statuscode,
                'message' => $message,
                'type' => $errorType,
                'data' => $data,
                );
        }
        #Operator Error Page
        // Operator level error page (casino)
        if($errorType === 'operator') {
            return view('wainwright::error-operator-template')->with('error', $message);
        }
        #Game Provider Error Page
        // Per game provider erroring
        if($errorType === 'gameprovider') {
            return view('wainwright::error-gameprovider-template')->with('error', $message);
        }
        #Fallback Error Page
        // Error page that is used if nothing is used
        return view('wainwright::error-default-template')->with('error', $message);
    }

    public static function morph_array_static($data)
    {
        $morph = new CasinoDog();
        return $morph->morph_array($data);
    }


}