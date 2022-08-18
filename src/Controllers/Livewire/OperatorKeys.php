<?php

namespace Wainwright\CasinoDog\Controllers\Livewire;

use Livewire\Component;
use Wainwright\CasinoDog\CasinoDog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Wainwright\CasinoDog\Controllers\OperatorsController;
class OperatorKeys extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    public $request_ip;

    public $state = [
        'ip' => '',
        'callback_url' => '',
    ];


    public function mount(Request $request)
    {
        $this->request_ip = CasinoDog ::requestIP($request);
    }

    protected $listeners = [
        'refresh-landing-page' => '$refresh',
    ];

    public function generateKey()
    {
        $this->resetErrorBag();
        $ip = $this->state['ip'];
        $link = $this->state['callback_url'];
        $validateIP = filter_var($ip, FILTER_VALIDATE_IP);
        $validateCallbackUrl = filter_var($link, FILTER_VALIDATE_URL);

        if(!$validateIP) {
            throw ValidationException::withMessages([
                'ip' => [__('IP syntax incorrect.')],
            ]);
        }
        if(!$validateCallbackUrl) {
            throw ValidationException::withMessages([
                'callback_url' => [__('Callback URL syntax incorrect.')],
            ]);
        }
        $auth = Auth::user();

        if(!$auth) {
            $this->result = 'Had trouble trying to authenticate your user.';
        }

        $data = [
            'operator_access' => $ip,
            'callback_url' => $link,
            'active' => 1,
            'ownedBy' => $auth->id,
        ];

        $create_key = OperatorsController::createOperatorKey($data);
        $result = json_decode($create_key, true);
        $this->result = $result['operator_key'];
        $this->emit('generatedKey');
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('wainwright::livewire.operator-keys');
    }
}
