<?php
namespace Wainwright\CasinoDog\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Wainwright\CasinoDog\Models\OperatorAccess;
use Illuminate\Support\Str;
use Wainwright\CasinoDog\Game\SessionsHandler;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OperatorsController
{
	public static function createOperatorKey($data) {
		$operator = new OperatorAccess();
		$operator->operator_key = Str::orderedUuid();
		$operator->operator_secret = Str::random(12);
		$operator->operator_access = $data['operator_access'];
		$operator->callback_url = $data['callback_url'];
		$operator->ownedBy = $data['ownedBy'];
		$operator->active = 1;
        $operator->last_used_at = now();
		$operator->timestamps = true;
		$operator->save();
        return $operator;
	}

	public static function operatorByKey($key)
	{
		$operator_query = Cache::get('operatorByKey:'.$key);
        if (!$operator_query) {
			$operator_query = OperatorAccess::where('operator_key', $key)->first();
			if(!$operator_query) {
				return false;
			} else {
				Cache::put('operatorByKey:'.$key, $operator_query, now()->addMinutes(60));
			}
		}
		$response = array('status' => 'success', 'data' => $operator_query);
		return $response;
	}

	public static function verifyKey($key, $ip) {
		if($ip === config('baseconfig.server_ip')) {
			$find = OperatorAccess::where('operator_key')->first();
		} else {
		$find = OperatorAccess::where('operator_key', $key)->where('operator_access', $ip)->first();
		}
		if(!$find) {
			return false;
		}
		$response = array('status' => 'success', 'data' => $find);
		return $response;
	}

	public static function operatorCallbacks($session_key, $action, $game_data = NULL)
	{
		$session = SessionController::sessionData($session_key);
		if($session === false) {
			Log::debug('Session not found while being asked to perform operator callback.');
			return false;
		}
		$operator_details = self::operatorByKey($session['session_data']['operator_id']);
		if($operator_details === false) {
			Log::debug('Operator not found: '.$session['session_data']['operator_id']);
			return false;
		}
		$callback = $operator_details['data']['callback_url'];
		if($operator_details['data']['operator_access'] === 'internal') {
			$callback = config('baseconfig.mock.callback_url'); // overriding callback url on internal sessions
		}
		if($action === 'balance') {
			$salt_sign = Str::random(12);
			$query = [
				'player_operator_id' => $session['session_data']['operator_id'],
				'currency' => $session['session_data']['currency'],
				'action' => 'balance',
				'sign' => hash_hmac('md5', $operator_details['data']['operator_secret'], $salt_sign),
				'salt_sign' => $salt_sign,
			];
			$http = Http::timeout(5)->get($callback, $query);
			if(!$http->status() === 200) {
				Log::warning('Error callback to '.$callback.' with query'.json_encode($query));
				return false;
			} else {
				$decode = json_decode($http, true);
				return $decode['data']['balance'];
			}
		} elseif($action === 'game') {
			$salt_sign = Str::random(12);
			$query = [
				'player_operator_id' => $session['session_data']['operator_id'],
				'currency' => $session['session_data']['currency'],
				'action' => 'game',
				'sign' => hash_hmac('md5', $operator_details['data']['operator_secret'], $salt_sign),
				'salt_sign' => $salt_sign,
				'game' => $session['session_data']['game_id'],
				'bet' => $game_data['bet'],
				'win' => $game_data['win'],
				'currency' => $session['session_data']['currency'],
			];
			$http = Http::timeout(5)->get($callback, $query);
			if(!$http->status() === 200) {
				Log::warning('Error callback to '.$callback.' with query'.json_encode($query));
				return false;
			} else {
				$decode = json_decode($http, true);
				return $decode['data']['balance'];
			}
		}
		return $callback;
	}


}
