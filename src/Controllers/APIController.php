<?php
namespace Wainwright\CasinoDog\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Wainwright\CasinoDog\CasinoDog;
use Wainwright\CasinoDog\Controllers\Game\SessionsHandler;
use Wainwright\CasinoDog\Controllers\OperatorsController;
use Illuminate\Support\Facades\Log;
use Wainwright\CasinoDog\Traits\ApiResponseHelper;

class APIController
{
   use ApiResponseHelper;

   public function createSessionEndpoint(Request $request)
    {
        $validate = $this->createSessionValidation($request);
        if($validate->status() !== 200) {
            return $validate;
        }
        $data = [
            'game' => $request->game,
            'currency' => $request->currency,
            'player' => $request->player,
            'operator_key' => $request->operator_key,
            'mode' => $request->mode,
            'request_ip' => CasinoDog::requestIP($request),
        ];
        $session_create = SessionController::createSession($data);
        if($session_create['status'] === 'success') {
            return $this->respondOk($session_create);
        } else {
            return $this->respondError($session_create);
        }
    }

    public function createSessionValidation(Request $request) {
        $validator = Validator::make($request->all(), [
            'game' => ['required', 'max:30', 'min:3'],
            'player' => ['required', 'min:3', 'max:100', 'regex:/^[^(\|\]`!%^&=};:?><’)]*$/'],
            'currency' => ['required', 'min:2', 'max:7'],
            'operator_key' => ['required', 'min:10', 'max:50'],
            'mode' => ['required', 'min:2', 'max:15'],
        ]);

        if ($validator->stopOnFirstFailure()->fails()) {
            $errorReason = $validator->errors()->first();
            $prepareResponse = array('message' => $errorReason, 'request_ip' => CasinoDog::requestIP($request));
            return $this->respondError($prepareResponse);
        }

        $operator_verify = OperatorsController::verifyKey($request->operator_key, CasinoDog::requestIP($request));
        if($operator_verify === false) {
                $prepareResponse = array('message' => 'Operator key did not pass validation.', 'request_ip' => CasinoDog::requestIP($request));
                return $this->respondError($prepareResponse);
        }
        if($request->mode !== 'real') {
            $prepareResponse = array('message' => 'Mode can only be \'demo\' or \'real\'.', 'request_ip' => CasinoDog::requestIP($request));
            return $this->respondError($prepareResponse);
        }
        return $this->respondOk();
    }

    public function createPlayer(Request $request)
    {
        $validate = $this->createPlayerValidation($request);
        if($validate->status() !== 200) {
            return $validate;
        }
        $playerInsert = array(
            'pid' => $request->pid,
            'secret' => $request->secret ?? NULL,
            'nickname' => $request->nickname ?? NULL,
            'active' => true,
            'data' => [],
            'auth' => 'basic',
            'ownedBy' => 1,
        );
        return CasinoDog::createPlayerFunction(json_encode($playerInsert));
    }

    public function createPlayerValidation(Request $request) {
        $validator = Validator::make($request->all(), [
            'pid' => ['required', 'min:4', 'max:100', 'regex:/^[^(\|\]`!%^&=};:?><’)]*$/'],
            'extra_id' => [ 'max:100', 'regex:/^[^(\|\]`!%^&=};:?><’)]*$/'],
            'nickname' => ['max:100', 'regex:/^[^(\|\]`!%^&=};:?><’)]*$/'],
            'secret' => ['max:50'],
        ]);

        if ($validator->stopOnFirstFailure()->fails()) {
            $errorReason = $validator->errors()->first();
            $prepareResponse = array('message' => $errorReason, 'request_ip' => CasinoDog::requestIP($request));
            return $this->respondError($prepareResponse);
        }
        $this->respondOk();
    }

}
